$(function() {
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
    function validateEmail(email){
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        if (filter.test(email)) {
            return true;
        }else {
            return false;
        }
    }
    function checkPhoneNUmber(phoneNumber){
        if(phoneNumber.match(/^[1-9][0-9]*$/)) {
            return true;
        }else{
            return false;
        }
    } 
    
    $("#checkOut").click(function(){
        $("#checkOutFA").removeClass("d-none").addClass("fa-spin");
        $("#termsError").addClass("d-none");
        $("#emailError").addClass("d-none");
        var requiredValue = ["titleName","firstName","lastName","email","idType","idNumber","tel"];
        var status = checkRequeredValue(requiredValue);
        if(status){
            if(checkPhoneNUmber($("#tel").val())){
                if($("#terms").prop("checked") === true){
                    if(validateEmail($("#email").val())){
                        
                        var postValue = {email:$("#email").val(),
                                        firstName:$("#firstName").val(),
                                        lastName:$("#lastName").val(),
                                        titleName:$("#titleName").val(),
                                        type:$("#raffleId").val(),
                                        isCharity:($("#isCharity").prop("checked") === true)?true:false,
                                        qty:$("#qty").val(),
                                        amount : $("#amount").val(),
                                        raffleId: $("#raffleId").val(),
                                        phone:$("#tel").val(),
                                        idNumber:$("#idNumber").val(),
                                        idType:$("#idType").val(),
                                    }
                        $.post("call/cart.php",{postValue:postValue},function(data){
                            if(data){
                                window.location.replace("rafflecheckout");
                            }
                        });
                    }else{
                        $("#emailError").html("Please enter the proper email format");  
                        $("#emailError").removeClass("d-none");
                        $("#checkOutFA").removeClass("fa-spin").addClass("d-none");
                    }
                }else{
                    $("#termsError").html("<br>You must agree the terms and conditions");  
                    $("#termsError").removeClass("d-none");
                    $("#checkOutFA").removeClass("fa-spin").addClass("d-none");
                }
            }else{
                 $("#telError").html("Please enter phone number with out 00 or +");  
                $("#telError").removeClass("d-none");
                $("#checkOutFA").removeClass("fa-spin").addClass("d-none");
            }
        }else{
            $("#checkOutFA").removeClass("fa-spin").addClass("d-none");
        }
      
    });
});