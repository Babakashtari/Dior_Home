"use strict";

var first_section = document.querySelector("main>section.welcome>div");
var paragraphs = document.querySelectorAll("main>section.welcome>div>p");
var sigining_section = document.querySelector("main>section.signing");
var legends = document.querySelectorAll("main > section.signing > div > fieldset > legend");
var inputs = document.querySelectorAll("main > section.signing > div > fieldset > form > div > input");
var error_messages = document.querySelectorAll("main > section.signing > div > fieldset > form > div > p");
var signin_inputs = document.querySelectorAll("main>section.signing>div>fieldset.signin>form>div>input");
var signup_inputs = document.querySelectorAll("main>section.signing>div>fieldset.signup>form>div>input");
var signin_submit_button = document.querySelector('main>section.signing>div>fieldset.signin>form>input[type="submit"]');
var signup_submit_button = document.querySelector('main>section.signing>div>fieldset.signup>form>input[type="submit"]');
var validation_result = document.querySelector("main>section.validation-result");
var validation_result_div = document.querySelector("main>section.validation-result>div");

var resizer = function resizer() {
    if (window.innerWidth < 1200) {
        first_section.classList.add("container-fluid");
        first_section.classList.remove("container");
        sigining_section.classList.add("container-fluid");
        sigining_section.classList.remove("container");
    } else {
        first_section.classList.remove("container-fluid");
        first_section.classList.add("container");
        sigining_section.classList.remove("container-fluid");
        sigining_section.classList.add("container");
    }

    if (window.innerWidth < 1040) {
        for (var i = 0; i < paragraphs.length; i++) {
            paragraphs[i].classList.add("text-justify");
            paragraphs[i].classList.remove("text-center");
        }
    } else {
        for (var _i = 0; _i < paragraphs.length; _i++) {
            paragraphs[_i].classList.remove("text-justify");

            paragraphs[_i].classList.add("text-center");
        }
    }

    if (window.innerWidth < 800) {
        for (var _i2 = 0; _i2 < legends.length; _i2++) {
            legends[_i2].style.fontSize = "1rem";
        }
    } else {
        for (var _i3 = 0; _i3 < legends.length; _i3++) {
            legends[_i3].style.fontSize = "1.5rem";
        }
    }
};

window.addEventListener("load", resizer);
window.addEventListener("resize", resizer);

var validate = function validate(regex, input) {
    for (var i = 0; i < error_messages.length; i++) {
        if (input === inputs[i]) {
            if (input.value === "") {
                input.classList.remove("passed");
                input.classList.remove("failed");
                error_messages[i].classList.add("displayNone");
            } else {
                var _validation_result = regex.test(input.value);

                if (_validation_result) {
                    input.classList.add("passed");
                    input.classList.remove("failed");
                    error_messages[i].classList.add("displayNone");
                } else {
                    input.classList.add("failed");
                    input.classList.remove("passed");
                    error_messages[i].classList.remove("displayNone");
                }
            }
        }
    }

    var validated_signup_inputs = document.querySelectorAll("main>section.signing>div>fieldset.signup>form>div>input.passed");
    var validated_signin_inputs = document.querySelectorAll("main>section.signing>div>fieldset.signin>form>div>input.passed");

    if (signin_inputs.length === validated_signin_inputs.length) {
        signin_submit_button.removeAttribute("disabled");
    } else {
        signin_submit_button.disabled = true;
    }

    if (signup_inputs.length === validated_signup_inputs.length) {
        signup_submit_button.removeAttribute("disabled");
    } else {
        signup_submit_button.disabled = true;
    }
};

var close_spinners = function close_spinners() {
    var container_of_spinners = document.querySelector("main > section.validation-result > div > div");
    var paragraph_results = document.querySelectorAll("main>section.validation-result>div>p");
    setTimeout(function () {
        container_of_spinners.classList.add("displayNone");

        for (var i = 0; i < paragraph_results.length; i++) {
            paragraph_results[i].classList.remove("displayNone");
        }
    }, 1000);
};

var close_modal = function close_modal() {
    var container = document.querySelector("main>section.validation-result");
    var modal = document.querySelector("main>section.validation-result>div");

    if (!container.classList.contains("displayNone")) {
        window.addEventListener("click", function (event) {
            if (event.target !== modal) {
                container.classList.add("displayNone");
            }
        });
    }
};

var change_url = function change_url() {
    location.replace("login.php");
}; // ajax call for form validation result:


var signing_validation = function signing_validation(event) {
    event.preventDefault();

    if (event.target.classList.contains("login")) {
        for (var i = 0; i < 4; i++) {
            inputs[i].value = null;
        }
    } else if (event.target.classList.contains("signup")) {
        for (var _i4 = 4; _i4 < inputs.length; _i4++) {
            inputs[_i4].value = null;
        }
    }

    var signup_username = inputs[0].value;
    var signup_password = inputs[1].value;
    var signup_email = inputs[2].value;
    var signup_mobile_phone = inputs[3].value;
    var login_username = inputs[4].value;
    var login_password = inputs[5].value; // const parameters = [inputs[0].value, inputs[1].value, inputs[2].value, inputs[3].value, inputs[4].value, inputs[5].value];
    // const AjaxLoader = (signup_username, signup_password, signup_email, signup_mobile_phone, login_username, login_password) => {

    var AJAX_request = new XMLHttpRequest();

    AJAX_request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // code to be executed when ajax receives an anwser...
            validation_result_div.innerHTML = this.responseText;
            validation_result.classList.remove("displayNone");
            close_spinners();
            close_modal();
            var validation_result_message = document.querySelector("main>section.validation-result>div>p.signing-message");

            if (validation_result_message.classList.contains("successful")) {
                setTimeout(function () {
                    change_url();
                }, 1000);
            }
        }
    };

    if (event.target.classList.contains("login")) {
        AJAX_request.open("POST", "php/loginResult.php", true);
    } else if (event.target.classList.contains("signup")) {
        AJAX_request.open("POST", "php/signup_result.php", true);
    }

    AJAX_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // prettier-ignore

    AJAX_request.send("signup_username=" + signup_username + "&signup_password=" + signup_password + "&signup_email=" + signup_email + "&signup_mobile_phone=" + signup_mobile_phone + "&login_username=" + login_username + "&login_password=" + login_password);
}; // AjaxLoader(...parameters);
// };