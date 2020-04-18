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
var users_error_messages = document.querySelectorAll("main>section.users-info>form>div.form-group>p");
var users_inputs = document.querySelectorAll("main>section.users-info>form>div.form-group>input");
var users_search_result_div = document.querySelector("main>section.users-info>div.result"); // ریفرش کردن صفحه برای اینکه متغیر های سیشن کار کنند:

window.onload = function () {
    if (!window.location.hash) {
        window.location = window.location + "#loaded";
        window.location.reload();
    }
}; // ظاهر شدن فیلد سرچ مربوطه در فرم بعد از تیک زدن چک باکس مربوطه در قسمت جستجوی کاربر:

var user_search_input_appear = function user_search_input_appear(event) {
    for (var i = 0; i < users_top_div_checkboxes.length; i++) {
        if (event.target === users_top_div_checkboxes[i]) {
            if (event.target.checked) {
                users_search_form_divs[i].classList.remove("displayNone");
            } else {
                users_search_form_divs[i].classList.add("displayNone");
            }
        }
    }
};

var user_search_input_appear2 = function user_search_input_appear2() {
    for (var i = 0; i < users_top_div_checkboxes.length; i++) {
        if (users_top_div_checkboxes[i].checked) {
            users_search_form_divs[i].classList.remove("displayNone");
        } else {
            users_search_form_divs[i].classList.add("displayNone");
        }
    }
};

user_search_input_appear2(); // ظاهر شدن دکمه جستجو بعد از فعال شدن حداقل یک فیلد توسط کاربر ادمین:

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

var function_loader = function function_loader(event) {
    user_search_input_appear(event);
    users_form_submit_button_appear();
};

for (var s = 0; s < users_top_div_checkboxes.length; s++) {
    users_top_div_checkboxes[s].addEventListener("change", function_loader);
} // ظاهر شدن فیلد سرچ مربوطه در فرم بعد از تیک زدن چک باکس مربوطه در قسمت جستجوی محصول:

var products_search_input_appear = function products_search_input_appear(event) {
    for (var i = 0; i < products_search_top_div_boxes.length; i++) {
        if (event.target === products_search_top_div_boxes[i]) {
            if (event.target.checked) {
                products_search_form_divs[i].classList.remove("displayNone");
            } else {
                products_search_form_divs[i].classList.add("displayNone");
            }
        }
    }
}; // ظاهر شدن دکمه جستجو بعد از فعال شدن حداقل یک فیلد توسط کاربر ادمین:

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

var function_loader2 = function function_loader2(event) {
    products_search_input_appear(event);
    products_form_submit_button_appear();
};

for (var _s = 0; _s < products_search_top_div_boxes.length; _s++) {
    products_search_top_div_boxes[_s].addEventListener("change", function_loader2);
}

var validate = function validate(regex, input) {
    for (var i = 0; i < users_error_messages.length; i++) {
        if (input === users_inputs[i]) {
            if (input.value === "") {
                input.classList.remove("passed");
                input.classList.remove("failed");
                users_error_messages[i].classList.add("displayNone");
            } else {
                var validation_result = regex.test(input.value);

                if (validation_result) {
                    input.classList.add("passed");
                    input.classList.remove("failed");
                    users_error_messages[i].classList.add("displayNone");
                } else {
                    input.classList.add("failed");
                    input.classList.remove("passed");
                    users_error_messages[i].classList.remove("displayNone");
                }
            }
        }
    }
};
