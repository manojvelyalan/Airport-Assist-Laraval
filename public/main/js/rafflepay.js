$(function() {
	
    $("#paynow").click(function(){

       $("#buttonFA").addClass("fa-spin").removeClass("d-none");
       $("#stripeMessage").removeClass("alert alert-success alert-danger").addClass("d-none");
       Stripe.setPublishableKey("pk_live_49jJ0dGQ9BlFkbQl1aOwlkW0");
       var requiredValue = ["address","city","state","country","zipcode","cardHolderName","cardNumber","cardMonth","cardYear","cvv"];
       if($("#charity").val() != "true"){
           requiredValue.push("shippingAddress","shippingCity","shippingState","shippingCountry","shippingZipcode",);
       }
        var status = checkRequeredValue(requiredValue);
       if(status){
           $("#cardError").addClass("d-none")
           var cardNumber = $("#cardNumber").val();
           var cardMonth = $("#cardMonth").val();
           var cardYear = $("#cardYear").val();
           var cardHolder = $("#cardHolderName").val();
            var cvv = $("#cvv").val();
           // billing address
           var address = $("#address").val();
           var city = $("#city").val();
           var state = $("#state").val();
           var zip = $("#zipcode").val();
           var country = $("#country").val();
          // shipping address..
          var shippingAddress = $("#shippingAddress").val();
           var shippingCity = $("#shippingCity").val();
           var shippingState = $("#shippingState").val();
           var shippingZip = $("#shippingZipcode").val();
           var shippingCountry = $("#shippingCountry").val();

           if (Stripe.validateCardNumber(cardNumber)) {
               if(Stripe.validateCVC(cvv)){
                   if(Stripe.validateExpiry(cardMonth, cardYear)){
                       createStripeToken(cardHolder,cardNumber,cardMonth,cardYear,cvv,address,city,state,zip,country,shippingAddress,shippingCity,shippingState,shippingZip,shippingCountry);

                   }else{
                       showcardError("The expiration date appears to be invalid.");                          
                       $("#buttonFA").removeClass("fa-spin").addClass("d-none");
                   }
               }else{
                   showcardError("The CVC number appears to be invalid.");
                   $("#buttonFA").removeClass("fa-spin").addClass("d-none");
               }
           }else{
               showcardError("The credit card number appears to be invalid.");
               $("#buttonFA").removeClass("fa-spin").addClass("d-none");
           }

       }else{
         $("#buttonFA").removeClass("fa-spin").addClass("d-none");
       }
   });
   
   function checkRequeredValue(requiredValue){
       var status = true;
       for(i=0;i<requiredValue.length;i++){               
           if( $("#"+requiredValue[i]).val() === ""){
               $("#"+requiredValue[i]+"Error").html("Please enter the value.");  
               $("#"+requiredValue[i]+"Error").removeClass("d-none");
               $( "#"+requiredValue[i]).focus();
               status = false;
               break;
           }else{
               $("#"+requiredValue[i]+"Error").removeClass("d-none").addClass("d-none");
           } 
       }
       return status;
   }

   function showcardError(message){
       $("#cardError").html(message);
       $("#cardError").removeClass("d-none");
   }

   function createStripeToken(cardHolder,cardNumber,cardMonth,cardYear,cvv,address,city,state,zip,country,shippingAddress,shippingCity,shippingState,shippingZip,shippingCountry){
       var raffleId = $("#raffleId").val();
       Stripe.createToken({
           number: cardNumber,
           cvc: cvv,
           exp_month: cardMonth,
           exp_year: cardYear,
           name: cardHolder,
           address_line1: address,
           address_city: city,
           address_state: state,
           address_zip: zip,
           address_country: country
       }, function(status, response){
           if (response.error) {
               showcardError(response.error.message);	
       } else { 
           var token = response['id'];
           var addressDetails = {address:address,city:city,state:state,zip:zip,country:country,shippingAddress:shippingAddress,shippingCity:shippingCity,shippingState:shippingState,shippingZip:shippingZip,shippingCountry:shippingCountry};
           $.post("call/rafflepayment.php",{token:token,raffleId:raffleId,addressDetails:addressDetails},function(result){
              
               var processStatus = JSON.parse(result)
               if(processStatus.status == true){
                   var id = processStatus.message;
                   window.location.replace("bookticket?id="+id);
               }else{
                   $("#stripeMessage").removeClass("d-none").addClass("alert alert-danger");
                   $("#stripeMessage").html(processStatus.message);
               }
               $("#buttonFA").removeClass("fa-spin").addClass("d-none");
           });

       }
       });
   }
   $("#copy").click(function(){
       if($("#copy").prop("checked") === true){
            var country = $("#country").val();
            $("#shippingAddress").val($("#address").val());
            $("#shippingCity").val($("#city").val());
            $("#shippingState").val($("#state").val());
            $("#shippingZipcode").val($("#zipcode").val());
            $("#shippingCountry option[value='"+country+"']").prop('selected', true);
          
        }  else{
            $("#shippingAddress").val("");
            $("#shippingCity").val("");
            $("#shippingState").val("");
            $("#shippingZipcode").val("");
            $("#shippingCountry option[value='']").prop('selected', true);
            
        }  
   });
   
}); 