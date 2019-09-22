$(document).ready(function() {
    function checkPhoneNUmber(phoneNumber) {
        if (phoneNumber.match(/^[1-9][0-9]*$/)) {
            return true;
        } else {
            return false;
        }
    }

    function validateEmail(email) {
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        if (filter.test(email)) {
            return true;
        } else {
            return false;
        }
    }

    function checkEmpty(fields) {
        var status = true;
        $.each(fields, function(i, field) {
            if (field.value === "") {
                $("#" + field.name + "Error").html("Please enter the value.");
                $("#" + field.name + "Error").removeClass("d-none");
                status = false;
                return false;
            } else {
                $("#" + field.name + "Error").removeClass("d-none").addClass("d-none");
            }
        });
        return status;
    }
    $("#mobile-number-country").intlTelInput({
        preferredCountries: ["us"],
    });

   

    $("#email").change(function() {
        $("#emailError").removeClass("d-none").addClass("d-none");
        var email = $("#email").val();
        if (email !== "") {
            if (validateEmail(email)) {
                $("#emailSpinner").removeClass("d-none").addClass("fa-spin");
                $.post("call/userinfo.php", {
                    email: email
                }, function(result) {
                    if (result != false) {
                        var userinfo = JSON.parse(result);
                        var firstName = userinfo.firstName.substr(0, 1).toUpperCase() + userinfo.firstName.substr(1);
                        var lastName = userinfo.lastName.substr(0, 1).toUpperCase() + userinfo.lastName.substr(1);
                        $("#firstName").val(firstName);
                        $("#lastName").val(lastName);
                        $("#titleName").val(userinfo.titleName);
                        if (userinfo.iso2Code != "") {
                            $("#phoneNumber").val(userinfo.contactNumber);
                            $("#mobile-number-country").intlTelInput("selectCountry", userinfo.iso2Code);
                        }
                    }
                    $("#emailSpinner").removeClass("fa-spin").addClass("d-none");
                });
            } else {
                $("#emailError").html("Please enter proper email format.");
                $("#emailError").removeClass("d-none");
            }
        }
    });
    $("#phoneNumber").change(function() {
        $("#phoneNumberError").removeClass("d-none").addClass("d-none");
        if (!checkPhoneNUmber($("#phoneNumber").val())) {
            $("#phoneNumberError").html("Please enter the correct phone number format.");
            $("#phoneNumberError").removeClass("d-none");
        }
    });
    $("#submitButton").click(function() {
        $("#buttonFA").addClass("fa fa-spinner m-auto fa-spin");
        var fields = $(":input").serializeArray();
        var status = checkEmpty(fields);
        var requestId = "";
        var postData = {};
        if (status) {
            $("#phoneNumberError").removeClass("d-none").addClass("d-none");
            $("#emailError").removeClass("d-none").addClass("d-none");
            if (checkPhoneNUmber($("#phoneNumber").val())) {
                if (validateEmail($("#email").val())) {
                    if($("#confirmEmail").val() === $("#email").val()){
                        var countryCode = $("#mobile-number-country").val();
                        if (countryCode !== "") {
                            $.each(fields, function(i, field) {
                                postData[field.name] = field.value;
                            });
                            $.post("call/request.php", {
                                postData: postData,
                                requestId: requestId
                            }, function(result) {
                                if (result) {
                                    window.location.replace("service?d=" + result);
                                } else {
                                    $("#formError").html("Something went wrong. Please try after some time");
                                    $("#buttonFA").removeClass("fa fa-spinner m-auto fa-spin");
                                }
                            });
                        } else {
                            $("#countryCodeError").html("Please select the country code.");
                            $("#countryCodeError").removeClass("d-none");
                            $("#buttonFA").removeClass("fa fa-spinner m-auto fa-spin");
                        }
                    }else{
                        $("#confirmEmailError").html("Email Id and Confirm Email Id should be same.");
                        $("#confirmEmailError").removeClass("d-none");
                        $("#buttonFA").removeClass("fa fa-spinner m-auto fa-spin");
                    }
                } else {
                    $("#emailError").html("Please enter proper email format.");
                    $("#emailError").removeClass("d-none");
                    $("#buttonFA").removeClass("fa fa-spinner m-auto fa-spin");
                }
            } else {
                $("#phoneNumberError").html("Please enter the correct phone number format.");
                $("#phoneNumberError").removeClass("d-none");
                $("#buttonFA");
            }
        } else {
            $("#buttonFA").removeClass("fa fa-spinner m-auto fa-spin");
        }
    });
    $("#step-1-btn").click(function() {
        
        $("#buttonFA").addClass("fa fa-spinner m-auto fa-spin");
        var fields = $("#step-1-form").serializeArray();
        var status = checkEmpty(fields);
        var postData = {};
        var requestId = $("#requestId").val();
        if (status) {
            $("#phoneNumberError").removeClass("d-none").addClass("d-none");
            $("#emailError").removeClass("d-none").addClass("d-none");
            if (checkPhoneNUmber($("#phoneNumber").val())) {
                if (validateEmail($("#email").val())) {
                    if($("#confirmEmail").val() === $("#email").val()){
                    var countryCode = $("#mobile-number-country").val();
                        if (countryCode !== "") {
                            $.each(fields, function(i, field) {
                                postData[field.name] = field.value;
                            });
                            $.post("call/request.php", {
                                postData: postData,
                                requestId: requestId
                            }, function(result) {

                                if (result) {
                                    $("#requestId").val(result);
                                    $("#step-1").hide();
                                    $("#step-3").hide();
                                    $("#step-2").show("slide", {
                                        direction: 'right'
                                    }, 0);
                                } else {
                                    $("#formError").html("Something went wrong. Please try after some time");
                                    $("#buttonFA").removeClass("fa fa-spinner m-auto fa-spin");
                                }
                            });
                        } else {
                            $("#countryCodeError").html("Please select the country code.");
                            $("#countryCodeError").removeClass("d-none");
                            $("#buttonFA").removeClass("fa fa-spinner m-auto fa-spin");
                        }
                    }else{
                        $("#confirmEmailError").html("Email Id and Confirm Email Id should be same.");
                        $("#confirmEmailError").removeClass("d-none");
                        $("#buttonFA").removeClass("fa fa-spinner m-auto fa-spin");
                    }
                } else {
                    $("#emailError").html("Please enter proper email format.");
                    $("#emailError").removeClass("d-none");
                    $("#buttonFA").removeClass("fa fa-spinner m-auto fa-spin");
                }
            } else {
                $("#phoneNumberError").html("Please enter the correct phone number format.");
                $("#phoneNumberError").removeClass("d-none");
                $("#buttonFA").removeClass("fa fa-spinner m-auto fa-spin");
            }
        } else {
            $("#buttonFA").removeClass("fa fa-spinner m-auto fa-spin");
        }
    });
    $("#step-2-btn-back").click(function() {
        $("#step-1").show("slide", {
            direction: 'left'
        }, 0);
        $("#step-2").hide();
        $("#step-3").hide();
        $("#buttonFA").removeClass("fa fa-spinner m-auto fa-spin");
    });
    $("#step-3-btn-back").click(function() {
        $("#step-1").hide();
        $("#step-2").show("slide", {
            direction: 'left'
        }, 0);
        $("#step-3").hide();
        $("#button-2-FA").removeClass("fa fa-spinner m-auto fa-spin");
    });
});


$("#originAirport").autocomplete({
    minLength: 1,
    source: "call/airportlist.php",
    focus: function(event, ui) {
        $("#originAirport").val(ui.item.countryName.replace(/\w\S*/g, function(txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        }) + " (" + ui.item.iata.toUpperCase() + ")");
        return false;
    },
    select: function(event, ui) {
        $("#originAirport").val(ui.item.countryName.replace(/\w\S*/g, function(txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        }) + " (" + ui.item.iata.toUpperCase() + ")");
        return false;
    }
}).data("ui-autocomplete")._renderItem = function(ul, item) {
    return $("<li>").data("ui-autocomplete-item", item).append("<span class='airport-code'>" + item.iata + "</span>" + " " + "<span class='airport-name'>" + item.countryName + "</span>" + "<div class='autocomplete-divider'></div>").appendTo(ul);
};
