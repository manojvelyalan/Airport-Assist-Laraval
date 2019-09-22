$(document).ready(function () {
    
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
   // login button action in login page... 
   $("#loginButton").click(function(){
            $("#loginFA").removeClass("d-none");
            $("#loginError").removeClass("d-none").addClass("d-none");
            var requiredValue = ['email','password'];
            var status = checkRequeredValue(requiredValue);
            var postValue = {};
            if(status){
                if(validateEmail($("#email").val())){
                    $.each(requiredValue,function(i,value){
                        postValue[value] = $("#"+value).val();
                    });
                    $.post("call/signup.php",{postValue:postValue},function(result){
                      
                        var resultData = $.parseJSON(result);
                        if(resultData.status){
                            window.location.href = "listallrequest";
                        }else{
                           
                            $("#loginError").html(resultData.message)
                            $("#loginError").removeClass("d-none");
                            $("#loginFA").addClass("d-none");
                        }
                    });
                    
                }else{
                    $("#emailError").html("Please enter proper email.");
                    $("#emailError").removeClass("d-none");
                    $( "#email").focus();
                    $("#loginFA").addClass("d-none");
                }
                
            }else{
                $("#loginFA").addClass("d-none");
            }
    });
    
    //update the amount in request details page........
    
    
    $("#updateAmount").click(function(){
    $("#updateFA").addClass("fa-spin").removeClass("d-none");
    $("#updateStatus").addClass("d-none text-success text-danger").removeClass("text-success text-danger");
    var creditCardCharges = $("#creditCardCharges").val();
    var totalAmount = $("#totalAmount").val();
    var requestId = $("#requestId").val();
    if(totalAmount !== "" & totalAmount !== "0"){
        $.post("call/updateamount.php",{totalAmount:totalAmount,requestId:requestId,creditCardCharges:creditCardCharges},function(result){
            if(result){
                $("#totalAmount").val((creditCardCharges !== 0)?Number(totalAmount) + Number(totalAmount*creditCardCharges/100):totalAmount);
                $("#updateStatus").html("Amount has been updated successfully.");
                $("#updateStatus").removeClass("d-none text-danger").addClass("text-success");
                $("#updateFA").addClass("d-none").removeClass("fa-spin");
            }else{
                $("#updateStatus").html("We are sorry.. something went wrong. Please try after some time.");
                $("#updateStatus").removeClass("d-none text-success").addClass("text-danger");
                $("#updateFA").addClass("d-none").removeClass("fa-spin");
            }
        });
        
    }else{
        $("#updateStatus").html("Please enter correct amount.");
        $("#updateStatus").removeClass("d-none text-success").addClass("text-danger");
        $("#updateFA").addClass("d-none").removeClass("fa-spin");
    }
});
$("#reset").click(function(){
    $("#FAReset").removeClass("d-none").addClass("fa-spin");
    var resetEmail = $("#resetEmail").val();        
    if(resetEmail !== ""){
         if(validateEmail(resetEmail)){
             $.post("call/resetpassword",{email:resetEmail},function(result){
                var jsonResult = JSON.parse(result);
                if(jsonResult['status']){
                    $("#resetStatus").html(jsonResult['message']);
                    $("#resetStatus").removeClass("d-none text-danger").addClass("text-success");
                    $("#FAReset").addClass("d-none").removeClass("fa-spin");
                }else{
                    $("#resetStatus").html(jsonResult['message']);
                    $("#resetStatus").removeClass("d-none text-success").addClass("text-danger");
                    $("#FAReset").addClass("d-none").removeClass("fa-spin");
                }
             });
         }else{
            $("#resetEmailError").html("Please enter proper email.");
            $("#resetEmailError").removeClass("d-none");
            $("#resetEmail").focus();
            $("#FAReset").removeClass("fa-spin").addClass("d-none");
         }
    }else{
        $("#resetEmailError").html("Please enter the value.");
        $("#resetEmailError").removeClass("d-none");
        $("#resetEmail").focus();
        $("#FAReset").removeClass("fa-spin").addClass("d-none");
    }
});

});



  
