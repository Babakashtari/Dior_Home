"use strict";

var inputs = document.querySelectorAll('main>section>form>div>input[type="email"]');
var error_messages = document.querySelectorAll("main>section>form>div>p");
console.log(error_messages);

var validate = function validate(regex, input) {
    for (var i = 0; i < error_messages.length; i++) {
        if (input === inputs[i]) {
            if (input.value === "") {
                input.classList.remove("passed");
                input.classList.remove("failed");
                error_messages[i].classList.add("displayNone");
            } else {
                var validation_result = regex.test(input.value);

                if (validation_result) {
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
};