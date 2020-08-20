"use strict";

var error_messages = document.querySelectorAll("main > section.form-container > div > fieldset > form > div.form-group > input + p");
var inputs = document.querySelectorAll("main>section.form-container>div>fieldset>form>div.form-group>input.form-input");
var personal_info_inputs = document.querySelectorAll("main>section.form-container>div>fieldset>form.personal-info>div.form-group>input");
var personal_info_gender_select = document.querySelector("main>section.form-container>div>fieldset>form.personal-info>div.form-group>select");
var contact_info_inputs = document.querySelectorAll("main>section.form-container>div>fieldset>form.contact-info>div.form-group>input");
var user_info_inputs = document.querySelectorAll("main>section.form-container>div>fieldset>form.user-info>div.form-group>input");
var validation_result = document.querySelector("main>section.validation-result");
var validation_result_div = document.querySelector("main>section.validation-result>div");

var form_validator = function form_validator(regex, input) {
    for (var i = 0; i < inputs.length; i++) {
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
}; // showing validation result modal box:


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

var user_info_validator = function user_info_validator(event) {
    event.preventDefault();
    var submit_name = event.target.getAttribute("name");
    var parameters = [];
    var names = [];

    if (event.target.getAttribute("name") === "personal_info") {
        for (var i = 0; i < personal_info_inputs.length; i++) {
            var _name = personal_info_inputs[i].getAttribute("name");

            names.push(_name);
            var _parameter = personal_info_inputs[i].value;
            parameters.push(_parameter);
        } // adding selected element for gender to the parameters and names arrays as it is not an "input" element and accordingly not included in the previous inputs loop:


        var name = personal_info_gender_select.getAttribute("name");
        var parameter = personal_info_gender_select.value;
        names.push(name);
        parameters.push(parameter);
    } else if (event.target.getAttribute("name") === "contact_info") {
        for (var _i = 0; _i < contact_info_inputs.length; _i++) {
            var _name2 = contact_info_inputs[_i].getAttribute("name");

            names.push(_name2); // getting the checkbox 0 / 1 values:

            if (_i === 2) {
                if (!contact_info_inputs[2].checked) {
                    parameters.push("NO");
                } else {
                    parameters.push("YES");
                }
            } else {
                var _parameter2 = contact_info_inputs[_i].value;
                parameters.push(_parameter2);
            }
        }
    } else if (event.target.getAttribute("name") === "user_info") {
        for (var _i2 = 0; _i2 < user_info_inputs.length; _i2++) {
            var _name3 = user_info_inputs[_i2].getAttribute("name");

            names.push(_name3);
            var _parameter3 = user_info_inputs[_i2].value;
            parameters.push(_parameter3);
        }
    }

    var AjaxLoader = function AjaxLoader(input_names, input_values, submit) {
        var ajax_string = "";

        for (var _i3 = 0; _i3 < input_names.length; _i3++) {
            ajax_string += input_names[_i3] + "=" + input_values[_i3] + "&";
        }

        ajax_string += submit + "=" + submit; // console.log(ajax_string);

        var AJAX_request = new XMLHttpRequest();

        AJAX_request.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // code to be executed when ajax receives an anwser...
                validation_result_div.innerHTML = this.responseText;
                validation_result.classList.remove("displayNone");
                close_spinners();
                close_modal();
            }
        };

        AJAX_request.open("POST", "php/user_modification_result.php", true);
        AJAX_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        AJAX_request.send(ajax_string);
        console.log(ajax_string);
    };

    AjaxLoader(names, parameters, submit_name);
};