"use strict";

var users_top_div_checkboxes = document.querySelectorAll('main>section.users-info>div.search_criteria>div>span>input[type="checkbox"]');
var users_search_form_divs = document.querySelectorAll("main>section.users-info>form>div.form-group");
var bottom_3_form_checkboxes = document.querySelectorAll('main>section.users-info>form>div.checkbox>label>input[type="checkbox"]');
var users_search_submit_button = document.querySelector('main>section.users-info>form>input[type="submit"]');
var products_search_submit_button = document.querySelector('main>section.products-info>form>input[type="submit"]');
var users_search_form_container = document.querySelector("main>section.users-info>form");
var products_search_form_container = document.querySelector("main>section.products-info>form");
var products_search_top_div_boxes = document.querySelectorAll('main>section.products-info>div.search_criteria>div>span>input[type="checkbox"]');
var products_search_form_divs = document.querySelectorAll("main>section.products-info>form>div.form-group");
var error_messages = document.querySelectorAll("div.form-group>p");
var inputs = document.querySelectorAll("div.form-group>input");
var users_search_result_div = document.querySelector("main>section.users-info>div.result"); // ظاهر شدن فیلد سرچ مربوطه در فرم بعد از تیک زدن چک باکس مربوطه در قسمت جستجوی کاربر:

var user_search_input_appear = function user_search_input_appear() {
    for (var i = 0; i < users_top_div_checkboxes.length; i++) {
        if (users_top_div_checkboxes[i].checked) {
            users_search_form_divs[i].classList.remove("displayNone");
        } else {
            users_search_form_divs[i].classList.add("displayNone");
        }
    }
};

user_search_input_appear(); // ظاهر شدن دکمه جستجو بعد از فعال شدن حداقل یک فیلد توسط کاربر ادمین:

var users_form_submit_button_appear = function users_form_submit_button_appear() {
    var message = "";

    for (var l = 0; l < users_top_div_checkboxes.length; l++) {
        if (users_top_div_checkboxes[l].checked) {
            message += "checked";
        }
    }

    if (message.includes("checked")) {
        users_search_submit_button.classList.remove("displayNone");
        users_search_form_container.style.boxShadow = "1px 1px 5px black";
    } else {
        users_search_submit_button.classList.add("displayNone");
        users_search_form_container.style.boxShadow = "none";
    }
};

users_form_submit_button_appear();

var users_value_checker = function users_value_checker(e) {
    if (!e.target.checked) {
        var checkbox_name = e.target.getAttribute("name");

        for (var i = 0; i < users_top_div_checkboxes.length; i++) {
            var input_field_name = users_search_form_divs[i].children[0].getAttribute("name");

            if (checkbox_name === input_field_name) {
                users_search_form_divs[i].children[0].value = "";
                users_search_form_divs[i].children[0].classList.remove("passed");
                users_search_form_divs[i].children[0].classList.remove("failed");
                var error_message = users_search_form_divs[i].querySelector("p");
                error_message.classList.add("displayNone");
            }
        }
    }
};

var function_loader = function function_loader(event) {
    user_search_input_appear();
    users_form_submit_button_appear();
    users_value_checker(event);
};

for (var s = 0; s < users_top_div_checkboxes.length; s++) {
    users_top_div_checkboxes[s].addEventListener("change", function_loader);
}

var products_search_input_appear = function products_search_input_appear() {
    for (var i = 0; i < products_search_top_div_boxes.length; i++) {
        if (products_search_top_div_boxes[i].checked) {
            products_search_form_divs[i].classList.remove("displayNone");
        } else {
            products_search_form_divs[i].classList.add("displayNone");
        }
    }
};

products_search_input_appear(); // ظاهر شدن دکمه جستجو بعد از فعال شدن حداقل یک فیلد توسط کاربر ادمین:

var products_form_submit_button_appear = function products_form_submit_button_appear() {
    var message = "";

    for (var l = 0; l < products_search_top_div_boxes.length; l++) {
        if (products_search_top_div_boxes[l].checked) {
            message += "checked";
        }
    }

    if (message.includes("checked")) {
        products_search_submit_button.classList.remove("displayNone");
        products_search_form_container.style.boxShadow = "1px 1px 5px black";
    } else {
        products_search_submit_button.classList.add("displayNone");
        products_search_form_container.style.boxShadow = "none";
    }
};

products_form_submit_button_appear();

var products_value_checker = function products_value_checker(e) {
    if (!e.target.checked) {
        var checkbox_name = event.target.getAttribute("name");

        for (var i = 0; i < products_search_top_div_boxes.length; i++) {
            var input_field_name = products_search_form_divs[i].children[0].getAttribute("name");

            if (checkbox_name === input_field_name) {
                products_search_form_divs[i].children[0].value = "";
                products_search_form_divs[i].children[0].classList.remove("passed");
                products_search_form_divs[i].children[0].classList.remove("failed"); // const error_message = products_search_form_divs[i].querySelector("p");
                // error_message.classList.add("displayNone");
            }
        }
    }
};

var function_loader2 = function function_loader2(event) {
    products_search_input_appear();
    products_form_submit_button_appear();
    products_value_checker(event);
};

for (var _s = 0; _s < products_search_top_div_boxes.length; _s++) {
    products_search_top_div_boxes[_s].addEventListener("change", function_loader2);
}

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