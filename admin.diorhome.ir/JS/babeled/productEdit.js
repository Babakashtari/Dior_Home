"use strict";

var inputs = document.querySelectorAll('input[type=text]');
var input_errors = document.querySelectorAll('input+p');
var selects = document.querySelectorAll('select');
var select_errors = document.querySelectorAll('select+p');
var subcategory_selector = document.querySelector('select#product_subcategory');
console.log(subcategory_selector);

var input_validate = function input_validate(regex, input) {
    for (var i = 0; i < inputs.length; i++) {
        if (input === inputs[i]) {
            if (input.value === "") {
                input.classList.remove("passed");
                input.classList.remove("failed");
                input_errors[i].classList.add("displayNone");
            } else {
                var validation_result = regex.test(input.value);

                if (validation_result) {
                    input.classList.add("passed");
                    input.classList.remove("failed");
                    input_errors[i].classList.add("displayNone");
                } else {
                    input.classList.add("failed");
                    input.classList.remove("passed");
                    input_errors[i].classList.remove("displayNone");
                }
            }
        }
    }
};

var select_validate = function select_validate(regex, select) {
    for (var i = 0; i < selects.length; i++) {
        if (select === selects[i]) {
            if (select.value === "") {
                select.classList.remove("passed");
                select.classList.remove("failed");
                select_errors[i].classList.add("displayNone");
            } else {
                if (regex.test(select.value)) {
                    select.classList.add("passed");
                    select.classList.remove("failed");
                    select_errors[i].classList.add("displayNone");
                } else {
                    select.classList.add("failed");
                    select.classList.remove("passed");
                    select_errors[i].classList.remove("displayNone");
                }
            }
        }
    }
};

var create_subcategory = function create_subcategory(event) {
    select_validate(/^(sleeping_products|living_room_products|carpet_products)$/, event.target);
    var categories = ["sleeping_products", "living_room_products", "carpet_products"];
    var values = [
        ["روبالشی", "روتختی", "ملافه", "کوسن"],
        ["پرده", "رومبلی", "کوسن", "رومیزی"],
        ["فرش", "روفرشی", "تابلوفرش"]
    ];

    var _loop = function _loop(i) {
        if (event.target.value === categories[i]) {
            values[i].forEach(function (item) {
                var option = document.createElement("option");
                var textNode = document.createTextNode(item);
                option.appendChild(textNode);
                option.setAttribute("value", item);
                option.classList.add(categories[i]);
                subcategory_selector.appendChild(option);
            });
        } else {
            var options = subcategory_selector.querySelectorAll("option");

            for (var s = 0; s < options.length; s++) {
                if (options[s].classList.contains(categories[i])) {
                    subcategory_selector.remove(options[s]);
                }
            }
        }
    };

    for (var i = 0; i < values.length; i++) {
        _loop(i);
    }
};