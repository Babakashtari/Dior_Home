"use strict";

var inputs = document.querySelectorAll("body>section.background-image>fieldset>form>div.form-group>input");
var errors = document.querySelectorAll("body > section.background-image > fieldset > form > div.form-group > p");
var section = document.querySelector("body > section.background-image");

var validate = function validate(regex, input) {
    var value = input.value; // if the input value is not empty:

    if (value !== "") {
        // when the inserted input value is valid:
        if (regex.test(value)) {
            input.style.border = "3px solid green";

            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i] === input) {
                    errors[i].classList.add("displayNone");
                }
            } // when the inserted input value is not valid:

        } else {
            input.style.border = "3px solid red";

            for (var _i = 0; _i < inputs.length; _i++) {
                if (inputs[_i] === input) {
                    errors[_i].classList.remove("displayNone");
                }
            }
        } // if the input value is empty:

    } else {
        input.style.border = "3px solid transparent";

        for (var _i2 = 0; _i2 < inputs.length; _i2++) {
            if (inputs[_i2] === input) {
                errors[_i2].classList.add("displayNone");
            }
        }
    }
};