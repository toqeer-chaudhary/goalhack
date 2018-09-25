
        /*
		=================================================================
		01 - To Check Company Name
		=================================================================
		*/
        $("#company-name").blur(function () {
            isValidCompanyName();
        })
        $("#company-name").focus(function () {
            $("#company-name").css({
                "border":"0px",
                "background":"#fff",
            });
        })
        function isValidCompanyName()
        {
            var companyName = $("#company-name").val();
            if(companyName == "") {
                $("#company-name").css({
                    "border":"2px solid red",
                });
                $("#company-name-has-error").html("Please Enter Company Name").css({
                    "color":"red",
                    "font-size":"13px",
                    "border-radius": "4px",
                });
                return true;
            }
            if(!/^[a-zA-Z\s]+$/.test(companyName)) {
                $("#company-name").css({
                    "border": "2px solid red"

                });

                $("#company-name-has-error").html("Company name must be in Alphabets").css({
                    "font-size": "14px",
                    "color": "red"
                });
                return true;
            }
            else {
                $("#company-name").css({
                    "border":"2px solid green",
                });
                $("#company-name-has-error").empty();
            }
            return false;
        }
        /*
        =================================================================
        02 - To Check Company Email
        =================================================================
        */
        $("#company-email").blur(function () {
            isValidCompanyEmail();
        })
        $("#company-email").focus(function () {
            $("#company-email").css({
                "border":"0px",
                "background":"#fff",
            });
        })
        function isValidCompanyEmail()
        {
            var companyEmail = $("#company-email").val();
            if(companyEmail == "") {
                $("#company-email").css({
                    "border":"2px solid red",
                });
                $("#company-email-has-error").html("Please Enter Company Email").css({
                    "color":"red",
                    "font-size":"13px",
                    "border-radius": "4px",
                });
                return true;
            } else {
                if(isValidEmailAddress(companyEmail))
                {
                    $("#company-email").css({
                        "border":"2px solid green",
                    });
                    $("#company-email-has-error").empty();
                }else {
                    $("#company-email-has-error").html("Please Enter Valid Email").css({
                        "color":"red",
                        "font-size":"13px",
                        "border-radius": "4px",
                    });
                }
            }
            return false;
        }
        function isValidEmailAddress(emailAddress) {
            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            return pattern.test(emailAddress);
        }
        /*
        =================================================================
        03 - To Check Password
        =================================================================
        */
        $("#password").blur(function () {
            isValidPassword();
        })
        $("#password").focus(function () {
            $("#password").css({
                "border":"0px",
                "background":"#fff",
            });
        })
        function isValidPassword()
        {
            var companyPassword = $("#password").val().length;
            if(companyPassword == "" ) {
                $("#password").css({
                    "border":"2px solid red",
                });
                $("#company-password-has-error").html("Please Enter  Password").css({
                    "color":"red",
                    "font-size":"13px",
                    "border-radius": "4px",
                });
                return true;
            } else {
                if (companyPassword <6 )
                {
                    $("#company-password-has-error").html("Atleast 6 characters").css({
                        "color":"red",
                        "font-size":"13px",
                        "border-radius": "4px",
                    });
                }else
                    {
                        $("#password").css({
                            "border":"2px solid green",
                        });
                        $("#company-password-has-error").empty();
                    }

            }
            return false;
        }
        /*
        =================================================================
        04 - To Confirm Password
        =================================================================
        */
        $("#confirm-password").blur(function () {
            isValidConfirmPassword();
        })
        $("#confirm-password").focus(function () {
            $("#confirm-password").css({
                "border":"0px",
                "background":"#fff",
            });
        })

        function isValidConfirmPassword() {
            var confirmPassword = $("#confirm-password").val();
            var companyPassword = $("#password").val();
            if (confirmPassword == "") {
                $("#confirm-password").css({
                    "border": "2px solid red",
                });
                $("#confirm-password-has-error").html("Please Enter Confirm Password").css({
                    "color": "red",
                    "font-size": "13px",
                    "border-radius": "4px",
                });
                return true;
            } else {

                if (confirmPassword != companyPassword) {
                    $("#confirm-password").css({
                        "border": "2px solid red",
                    });
                    $("#confirm-password-has-error").html("Password don't match").css({
                        "color": "red",
                        "font-size": "13px",
                        "border-radius": "4px",
                    });
                } else {
                    $("#confirm-password").css({
                        "border": "2px solid green",
                    });
                    $("#confirm-password-has-error").empty();
                }
            }
            return false;
        }
        /*
        =================================================================
        05 - To Check Company Address
        =================================================================
        */
        $("#company-address").blur(function () {
            isValidCompanyAddress();
        })
        $("#company-address").focus(function () {
            $("#company-address").css({
                "border":"0px",
                "background":"#fff",
            });
        })
        function isValidCompanyAddress()
        {
            var companyAddress = $("#company-address").val();
            if(companyAddress == "") {
                $("#company-address").css({
                    "border":"2px solid red",
                });
                $("#company-address-has-error").html("Please Enter Company Address").css({
                    "color":"red",
                    "font-size":"13px",
                    "border-radius": "4px",
                });
                return true;
            } else {
                $("#company-address").css({
                    "border":"2px solid green",
                });
                $("#company-address-has-error").empty();
            }
            return false;
        }
        /*
        =================================================================
        06 - To Check Company contact
        =================================================================
        */
        $("#company-contact").blur(function () {
            isValidCompanyContact();
        })
        $("#company-contact").focus(function () {
            $("#company-contact").css({
                "border":"0px",
                "background":"#fff",
            });
        })
        function isValidCompanyContact()
        {
            var companyContact = $("#company-contact").val();
            if(companyContact == "") {
                $("#company-contact").css({
                    "border":"2px solid red",
                });
                $("#company-contact-has-error").html("Please Enter Company Contact").css({
                    "color":"red",
                    "font-size":"13px",
                    "border-radius": "4px",
                });
                return true;
            }
            if( isNaN(parseInt(companyContact, 15)) ) {
                $("#company-contact").css({
                    "border":"1px solid red"
                });
                $("#company-contact-has-error").html("Invalid: e.g 0900112222").css({
                    "color":"red",
                    "font-size":"12px"

                });
                return true;
            }
            else {
                $("#company-contact").css({
                    "border":"2px solid green",
                });
                $("#company-contact-has-error").empty();
            }
            return false;
        }
        /*
        =================================================================
        07 - To Check Company website
        =================================================================
        */
        $("#company-website").blur(function () {
            isValidCompanyWebsite();
        })
        $("#company-website").focus(function () {
            $("#company-website").css({
                "border":"0px",
                "background":"#fff",
            });
        })
        function isValidCompanyWebsite()
        {
            var companyWebsite = $("#company-website").val();
            if(companyWebsite == "") {
                $("#company-website").css({
                    "border":"2px solid red",
                });
                $("#company-website-has-error").html("Please Enter Company Website").css({
                    "color":"red",
                    "font-size":"13px",
                    "border-radius": "4px",
                });
                return true;
            } else {
                $("#company-website").css({
                    "border":"2px solid green",
                });
                $("#company-website-has-error").empty();
            }
            return false;
        }
        /*
        =================================================================
        08 - To Check Company country
        =================================================================
        */
        $("#company-country").blur(function () {
            isValidCompanyCountry();
        })
        $("#company-country").focus(function () {
            $("#company-country").css({
                "border":"0px",
                "background":"#fff",
            });
        })
        function isValidCompanyCountry()
        {
            var companyCountry = $("#company-country").val();
            if(companyCountry == "") {
                $("#company-country").css({
                    "border":"2px solid red",
                });
                $("#company-country-has-error").html("Please Enter Company Country").css({
                    "color":"red",
                    "font-size":"13px",
                    "border-radius": "4px",
                });
                return true;
            }
            /*if(!/^[a-zA-Z]*$/g.test(companyCountry)) {
                $("#company-country").css({
                    "border": "2px solid red"

                });

                $("#company-country-has-error").html("Invalid country").css({
                    "font-size": "14px",
                    "color": "red"
                });
                return true;
            }*/
            else {
                $("#company-country").css({
                    "border":"2px solid green",
                });
                $("#company-country-has-error").empty();
            }
            return false;
        }
        /*
        =================================================================
        09 - To Check Company province
        =================================================================
        */
        $("#company-province").blur(function () {
            isValidCompanyProvince();
        })
        $("#company-province").focus(function () {
            $("#company-province").css({
                "border":"0px",
                "background":"#fff",
            });
        })
        function isValidCompanyProvince()
        {
            var companyProvince = $("#company-province").val();
            if(companyProvince == "") {
                $("#company-province").css({
                    "border":"2px solid red",
                });
                $("#company-province-has-error").html("Please Enter Company Province").css({
                    "color":"red",
                    "font-size":"13px",
                    "border-radius": "4px",
                });
                return true;
            }
/*
            if(!/^[a-zA-Z]*$/g.test(companyProvince)) {
                $("#company-province").css({
                    "border": "2px solid red"

                });

                $("#company-province-has-error").html("Invalid country").css({
                    "font-size": "14px",
                    "color": "red"
                });
                return true;
            }
*/
            else {
                $("#company-province").css({
                    "border":"2px solid green",
                });
                $("#company-province-has-error").empty();
            }
            return false;
        }
        /*
        =================================================================
        10 - To Check Company city
        =================================================================
        */
        $("#company-city").blur(function () {
            isValidCompanyCity();
        })
        $("#company-city").focus(function () {
            $("#company-city").css({
                "border":"0px",
                "background":"#fff",
            });
        })
        function isValidCompanyCity()
        {
            var companyCity = $("#company-city").val();
            if(companyCity == "") {
                $("#company-city").css({
                    "border":"2px solid red",
                });
                $("#company-city-has-error").html("Please Enter Company City").css({
                    "color":"red",
                    "font-size":"13px",
                    "border-radius": "4px",
                });
                return true;
            }
            /*if(!/^[a-zA-Z]*$/g.test(companyCity)) {
                $("#company-city").css({
                    "border": "2px solid red"

                });

                $("#company-city-has-error").html("Invalid city").css({
                    "font-size": "14px",
                    "color": "red"
                });
                return true;
            }*/
            else {
                $("#company-city").css({
                    "border":"2px solid green",
                });
                $("#company-city-has-error").empty();
            }
            return false;
        }

        /*
        =================================================================
        11 - To Check Submit
        =================================================================
        */

        $("#submit-registration-form").click(function () {
           /* var companyName       = $("#company-name").val();
            var companyEmail      = $("#company-email").val();
            var companyPassword   = $("#password").val();
            var confirmPassword   = $("#confirm-password").val();
            var companyAddress    = $("#company-address").val();
            var companyContact    = $("#company-contact").val();
            var companyWebsite    = $("#company-website").val();
            var companyCountry    = $("#company-country").val();
            var companyProvince   = $("#company-province").val();
            var companyCity       = $("#company-city").val();*/

            if (isValidCompanyName()||isValidCompanyEmail()||isValidPassword()||isValidConfirmPassword()|| isValidCompanyAddress()|| isValidCompanyContact()||isValidCompanyWebsite()||isValidCompanyCountry()||isValidCompanyProvince()||isValidCompanyCity())
            {
                isValidCompanyName();
                isValidCompanyEmail();
                isValidPassword();
                isValidConfirmPassword();
                isValidCompanyAddress();
                isValidCompanyContact();
                isValidCompanyWebsite();
                isValidCompanyCountry();
                isValidCompanyProvince();
                isValidCompanyCity();
                return false;
            }else {
                return true;
            }

        })

/*+++++++++++++++++++++++++++++++ Validation on Contact us form +++++++++++++++++++++++++++++++++++++++++++++*/
        /*
		=================================================================
		01 - To Check Name
		=================================================================
		*/
        $("#first-name").blur(function () {
            isValidFirstName();
        })
        $("#first-name").focus(function () {
            $("#first-name").css({
                "border":"0px",
                "background":"#fff",
            });
        })
        function isValidFirstName()
        {
            var firstName = $("#first-name").val();
            if(firstName == "") {
                $("#first-name").css({
                    "border-bottom":"1px solid red",
                });
                $("#first-name-has-error").html("Please Enter your name").css({
                    "color":"red",
                    "font-size":"13px",
                    "border-radius": "4px",
                });
                return true;
            }
            if(!/^[a-zA-Z\s]+$/.test(firstName)) {
                $("#first-name").css({
                    "border": "2px solid red"

                });

                $("#first-name-has-error").html("Your name must be in Alphabets").css({
                    "font-size": "14px",
                    "color": "red"
                });
                return true;
            }
            else {
                $("#first-name").css({
                    "border-bottom":"1px solid green",
                });
                $("#first-name-has-error").empty();
            }
            return false;
        }
        /*
        =================================================================
        02 - To Check User Email
        =================================================================
        */
        $("#user-email").blur(function () {
            isValidUserEmail();
        })
        $("#user-email").focus(function () {
            $("#user-email").css({
                "border":"0px",
                "background":"#fff",
            });
        })
        function isValidUserEmail()
        {
            var userEmail = $("#user-email").val();
            if(userEmail == "") {
                $("#user-email").css({
                    "border-bottom":"1px solid red",
                });
                $("#user-email-has-error").html("Please Enter your email").css({
                    "color":"red",
                    "font-size":"13px",
                    "border-radius": "4px",
                });
                return true;
            } else {
                if(isValidEmailAddress(userEmail))
                {
                    $("#user-email").css({
                        "border-bottom":"1px solid green",
                    });
                    $("#user-email-has-error").empty();
                }else {
                    $("#user-email-has-error").html("Please Enter Valid Email").css({
                        "color":"red",
                        "font-size":"13px",
                        "border-radius": "4px",
                    });
                }
            }
            return false;
        }
        function isValidEmailAddress(emailAddress) {
            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            return pattern.test(emailAddress);
        }
        /*
         =================================================================
         01 - To Check User message
         =================================================================
         */
        $("#message").blur(function () {
            isValidMessage();
        })
        $("#message").focus(function () {
            $("#message").css({
                "border":"0px",
                "background":"#fff",
            });
        })
        function isValidMessage()
        {
            var message = $("#message").val();
            if(message == "") {
                $("#message").css({
                    "border-bottom":"1px solid red",
                });
                $("#message-has-error").html("Please Enter your message").css({
                    "color":"red",
                    "font-size":"13px",
                    "border-radius": "4px",
                });
                return true;
            }
            if(!/^[a-zA-Z\s]+$/.test(message)) {
                $("#message").css({
                    "border-bottom":"1px solid red",

                });

                $("#message-has-error").html("Your name must be in Alphabets").css({
                    "font-size": "14px",
                    "color": "red"
                });
                return true;
            }
            else {
                $("#message").css({
                    "border-bottom":"1px solid green",
                });
                $("#message-has-error").empty();
            }
            return false;
        }

        /*++++++++++++Submit contact us form+++++++*/
        $("#submit-contact-form").click(function () {
            if (isValidFirstName() || isValidUserEmail() || isValidMessage() )
            {
                isValidFirstName();
                isValidUserEmail();
                isValidMessage();
                return false;
            }
            else
            {
                return true;
            }
        })




























































































































        /*
        =================================================================
                Muneeb Work
        =================================================================
        */

       /* $("#firstName").blur(function(){
            if($(this).val().length < 1)
            {
                $(this).css("border-color","red");

                $('#firstName-error').show().html('Enter Your Name').css({"background-color": "orange","font-size": "150%"});
            }
            else
            {
                $(this).css("border-color","green");
            }
        });
        var firstName = $("#firstName");
        firstName.focus(function(){
            $(this).css("border-color","#0c90ce");
            $('#firstName-error').hide();
        });

        $("#email").blur(function(){
            if($(this).val().length < 1)
            {
                $(this).css("border-color","red");
                $('#email-error').show().html('Enter your Email address').css({"background-color":"yellow","font-size":"150%"});
            }
            else
            {
                $(this).css("border-color","green");
            }
        });
        var email = $("#email");
        email.focus(function(){
            $(this).css("border-color","#0c90ce");
            $('#email-error').hide();

        });
        $("#message").blur(function(){
            if($(this).val().length < 1)
            {
                $(this).css("border-color","red");
                $('#msg-error').show().html('Enter your Email address').css({"background-color":"red","font-size":"150%"});
            }
            else
            {
                $(this).css("border-color","green");
            }
        });
        var message = $("#message");
        message.focus(function(){
            $(this).css("border-color","#0c90ce");
            $('#msg-error').hide();

        });

        $(document).ready(function(){
            $("button").click(function(){
                if($("#firstName").val().length < 1)
                {
                    $("#firstName").css("border-color","red");
                    $('#firstName-error').show().html('Enter your Email address').css({"background-color":"red","font-size":"150%"});
                }
                else
                {
                    $(this).css("border-color","green");
                }
                if($("#email").val().length < 1)
                {
                    $("#email").css("border-color","red");
                    $('#email-error').show().html('Enter your Email address').css({"background-color":"red","font-size":"150%"});
            }
                else
                {
                    $(this).css("border-color","green");
                }
                if($("#message").val().length < 1)
                {
                    $("#message").css("border-color","red");
                    $('#msg-error').show().html('Enter your Email address').css({"background-color":"red","font-size":"150%"});
                }
                else
                {
                    $(this).css("border-color","green");
                }

                if (($("#firstName").val().length>1) && ($("#email").val().length>1) && ($("#message").val().length>1))
                {
                    return true;
                    $('#sendemail-error').show().html('Email send successfuly ').css({"background-color":"red","font-size":"150%"});
                }
                else{
                    return false;
                }



            });
        });
        //====================================
       //validation of company profile update
      //====================================
        $("#name").blur(function(){
            if($(this).val().length < 1)
            {
                $(this).css("border-color","red");
                $('#name-error').show().html('Enter Your Name').css({"background-color": "orange","font-size": "150%"});
            }
            else
            {
                $(this).css("border-color","green");
            }
        });
        var Name = $("#name");
        firstName.focus(function(){
            $(this).css("border-color","#0c90ce");
            $('#name-error').hide();

        });
        $("#email").blur(function(){
            if($(this).val().length < 1)
            {
                $(this).css("border-color","red");
                $('#email-error').show().html('Enter Your email').css({"background-color": "orange","font-size": "150%"});
            }
            else
            {
                $(this).css("border-color","green");
            }
        });
        var email = $("#email");
        email.focus(function(){
            $(this).css("border-color","#0c90ce");
            $('#email-error').hide();

        });
        $("#address").blur(function(){
            if($(this).val().length < 1)
            {
                $(this).css("border-color","red");
                $('#address-error').show().html('Enter Your address').css({"background-color": "orange","font-size": "150%"});
            }
            else
            {
                $(this).css("border-color","green");
            }
        });
        var address = $("#address");
        address.focus(function(){
            $(this).css("border-color","#0c90ce");
            $('#address-error').hide();

        });
        $("#contact").blur(function(){
            if($(this).val().length < 1)
            {
                $(this).css("border-color","red");
                $('#contact-error').show().html('Enter Your contact').css({"background-color": "orange","font-size": "150%"});
            }
            else
            {
                $(this).css("border-color","green");
            }
        });
        var contact = $("#contact");
        contact.focus(function(){
            $(this).css("border-color","#0c90ce");
            $('#contact-error').hide();

        });

        $("#website").blur(function(){
            if($(this).val().length < 1)
            {
                $(this).css("border-color","red");
                $('#website-error').show().html('Enter Your website').css({"background-color": "orange","font-size": "150%"});
            }
            else
            {
                $(this).css("border-color","green");
            }
        });
        var website = $("#website");
        contact.focus(function(){
            $(this).css("border-color","#0c90ce");
            $('#website-error').hide();

        });

        $("#city").blur(function(){
            if($(this).val().length < 1)
            {
                $(this).css("border-color","red");
                $('#city-error').show().html('Enter Your Name').css({"background-color": "orange","font-size": "150%"});
            }
            else
            {
                $(this).css("border-color","green");

            }
        });
        var city = $("#city");
        city.focus(function(){
            $(this).css("border-color","#0c90ce");
            $('#city-error').hide();

        });

        $("#province").blur(function(){
            if($(this).val().length < 1)
            {
                $(this).css("border-color","red");
                $('#province-error').show().html('Enter Your province').css({"background-color": "orange","font-size": "150%"});
            }
            else
            {
                $(this).css("border-color","green");
            }
        });
        var province = $("#province");
        province.focus(function(){
            $(this).css("border-color","#0c90ce");
            $('#province-error').hide();

        });
        $("#country").blur(function(){
            if($(this).val().length < 1)
            {
                $(this).css("border-color","red");
                $('#country-error').show().html('Enter Your country').css({"background-color": "orange","font-size": "150%"});
            }
            else
            {
                $(this).css("border-color","green");
            }
        });
        var country = $("#country");
        country.focus(function(){
            $(this).css("border-color","#0c90ce");
            $('#country-error').hide();

        });

        $("#password").blur(function(){
            if($(this).val().length < 1)
            {
                $(this).css("border-color","red");
                $('#password-error').show().html('Enter Your password').css({"background-color": "orange","font-size": "150%"});
            }
            else
            {
                $(this).css("border-color","green");
            }
        });
        var password = $("#password");
        password.focus(function(){
            $(this).css("border-color","#0c90ce");
            $('#password-error').hide();

        });
*/



// Zeeshan Tanveer
        $(document).ready(function() {

            //Payment Email Verification

            $('#payment-email').on('change', function() {
                var paymentEmail = $('#payment-email').val();
                $('#email_has_error_message').empty();
                //ajax request
                $.ajax({
                    url: "company/subscription/verify/"+paymentEmail,
                    type: 'GET',
                    /*data: {
                        'email' : paymentEmail,
                    },*/
                    // dataType: 'json',
                    success: function(result) {
                        if (result == paymentEmail)
                        {
                            $('#email_has_error_message');
                        }
                        else
                        {
                            $('#email_has_error_message').append('Email does not exist').css({'color':'#a94442', 'border-color':'#a94442'});
                        }

                    },
                    error: function(data){
                        //error
                    }
                });
            });

            // loader plugin initialization
            function loadingOut(loading) {
                setTimeout(() => loading.out(), 500);
            }

            function loadingFunction() {
                var loading = new Loading();
                loadingOut(loading);
            }


            // Change the key to your one
            Stripe.setPublishableKey('pk_test_euhzBKCZpMYMImjMMIbNyDVd');
            $('#paymentForm').formValidation({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        card_brand: {
                            validators: {
                                notEmpty: {
                                    message: 'The name is required'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z ]+$/,
                                    message: 'The Card Name cannot be a number'
                                }
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'The email is required'
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'The password is required'
                                }
                            }
                        },
                        ccNumber: {
                            selector: '[data-stripe="number"]',
                            validators: {
                                notEmpty: {
                                    message: 'The credit card number is required'
                                },
                                creditCard: {
                                    message: 'The credit card number is not valid'
                                }
                            }
                        },
                        expMonth: {
                            selector: '[data-stripe="exp-month"]',
                            //row: '.col-xs-3',
                            validators: {
                                notEmpty: {
                                    message: 'The expiration month is required'
                                },
                                digits: {
                                    message: 'The expiration month can contain digits only'
                                },
                                callback: {
                                    message: 'Expired',
                                    callback: function(value, validator) {
                                        value = parseInt(value, 10);
                                        var year         = validator.getFieldElements('expYear').val(),
                                            currentMonth = new Date().getMonth() + 1,
                                            currentYear  = new Date().getFullYear();
                                        if (value < 0 || value > 12) {
                                            return false;
                                        }
                                        if (year == '') {
                                            return true;
                                        }
                                        year = parseInt(year, 10);
                                        if (year > currentYear || (year == currentYear && value >= currentMonth)) {
                                            validator.updateStatus('expYear', 'VALID');
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    }
                                }
                            }
                        },
                        expYear: {
                            selector: '[data-stripe="exp-year"]',
                            //row: '.col-xs-3',
                            validators: {
                                notEmpty: {
                                    message: 'The expiration year is required'
                                },
                                digits: {
                                    message: 'The expiration year can contain digits only'
                                },
                                callback: {
                                    message: 'Expired',
                                    callback: function(value, validator) {
                                        value = parseInt(value, 10);
                                        var month        = validator.getFieldElements('expMonth').val(),
                                            currentMonth = new Date().getMonth() + 1,
                                            currentYear  = new Date().getFullYear();
                                        if (value < currentYear || value > currentYear + 100) {
                                            return false;
                                        }
                                        if (month == '') {
                                            return false;
                                        }
                                        month = parseInt(month, 10);
                                        if (value > currentYear || (value == currentYear && month >= currentMonth)) {
                                            validator.updateStatus('expMonth', 'VALID');
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    }
                                }
                            }
                        },
                        cvvNumber: {
                            selector: '[data-stripe="cvc"]',
                            validators: {
                                notEmpty: {
                                    message: 'The CVV number is required'
                                },
                                cvv: {
                                    message: 'The value is not a valid CVV',
                                    creditCardField: 'ccNumber'
                                }
                            }
                        }
                    }
                })
                .on('success.form.fv', function(e) {
                    e.preventDefault();
                    var $form = $(e.target);
                    // Reset the token first
                    $form.find('[name="token"]').val('');
                    Stripe.card.createToken($form, function(status, response) {
                        if (response.error) {
                            alert(response.error.message);
                        } else {
                            // Set the token value
                            $form.find('[name="token"]').val(response.id);
                            // Or using Ajax
                            $.ajax({
                                // You need to change the url option to your back-end endpoint
                                url: "subscription",
                                data: $form.serialize(),
                                method: 'POST',
                                dataType: 'json'
                            }).success(function(result) {
                                loadingFunction();
                                swal({
                                    icon: "success",
                                    text: "Payment Successfully Recieved!"
                                });
                                // Reset the form
                                $form.formValidation('resetForm', true);
                            });
                            console.log($form.serialize());
                        }
                    });
                });

            //Drop Down change event


            $("#package-option").on('change', function() {
                $('#selected-package').empty();
                var packageId = $('option:selected', this).attr('data-id');
                    $.ajax ({
                        type: 'GET',
                        url: 'fetch-package/'+packageId,
                        success : function(data) {
                            console.log(data);
                            //console.log(data);
                            $('#selected-package').append("<div class=\"pricingTable\">\n" +
                                "                    <span class=\"icon\"><i class=\"fa fa-globe\"></i></span>\n" +
                                "                    <div class=\"pricingTable-header\">\n" +
                                "                        <h3 class=\"title\">"+ data.nickname+"</h3>\n" +
                                "                        <span class=\"price-value\">"+ '$'+data.amount+"</span><span class=\"month\">/Month</span>\n" +
                                "                    </div>\n" +
                                "                    <ul class=\"pricing-content\">\n" +
                                "                        <li>"+'Ideal for less than '+ data.metadata.users +" Users</li>\n" +
                                "                        <li>Unlimited Visions</li>\n" +
                                "                        <li>Unlimited Strategies</li>\n" +
                                "                        <li>Unlimited KPIs</li>\n" +
                                "                        <li>Unlimited Goals</li>\n" +
                                "                        <li>Objectives & Key-Results Management</li>\n" +
                                "                        <li>Task Management</li>\n" +
                                "                    </ul>\n" +
                                "                    <a href=\"#\" class=\"pricingTable-signup\">Selected Plan</a>\n" +
                                "                </div>").css({'margin-top':'20px'});

                        }
                    });

            });


        }); //End of Ready Function

