$(function() {
	
    $("#paynow").click(function(){

       $("#buttonFA").addClass("fa-spin").removeClass("d-none");
       $("#stripeMessage").removeClass("alert alert-success alert-danger").addClass("d-none");
       Stripe.setPublishableKey("pk_live_4SevjbFhjzxBlzFfpPqElooS");
       var requiredValue = ["address","city","state","country","zipcode","cardHolderName","cardNumber","cardMonth","cardYear","cvv"];
       var status = checkRequeredValue(requiredValue);
       if(status){
           $("#cardError").addClass("d-none")
           var cardNumber = $("#cardNumber").val();
           var cardMonth = $("#cardMonth").val();
           var cardYear = $("#cardYear").val();
           var cardHolder = $("#cardHolderName").val();
           var address = $("#address").val();
           var city = $("#city").val();
           var state = $("#state").val();
           var zip = $("#zipcode").val();
           var country = $("#country").val();
           var cvv = $("#cvv").val();

           if (Stripe.validateCardNumber(cardNumber)) {
               if(Stripe.validateCVC(cvv)){
                   if(Stripe.validateExpiry(cardMonth, cardYear)){
                       createStripeToken(cardHolder,cardNumber,cardMonth,cardYear,cvv,address,city,state,zip,country);

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

   function createStripeToken(cardHolder,cardNumber,cardMonth,cardYear,cvv,address,city,state,zip,country){
       var requestId = $("#requestId").val();
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
           var addressDetails = {address:address,city:city,state:state,zip:zip,country:country};
           $.post("call/payment.php",{token:token,requestId:requestId,addressDetails:addressDetails},function(result){
               if(result === "done"){
                   $("#stripeMessage").removeClass("d-none").addClass("alert alert-success");
                   $("#stripeMessage").html("Your payment has been completed successfully.");
                   $("#paymentTable").addClass("d-none");
               }else{
                   $("#stripeMessage").removeClass("d-none").addClass("alert alert-danger");
                   $("#stripeMessage").html(result);
               }
               $("#buttonFA").removeClass("fa-spin").addClass("d-none");
           });

       }
       });
   }
}); 