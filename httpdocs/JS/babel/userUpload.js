"use strict";

var form_container = document.querySelector("main > section.file-upload");
var category_selector = document.querySelector("main>section.file-upload>fieldset>form>div.form-group>select#category");
var category_error = document.querySelector("main>section.file-upload>fieldset>form>div.form-group>select#category+p");
var subcategory_selector = document.querySelector("main>section.file-upload>fieldset>form>div.form-group>select#subcategory");
var subcategory_container = document.querySelector("main>section.file-upload>fieldset>form>div.form-group.sub");
var preview_container = document.querySelector("main > section.file-upload > div.preview-container");
var preview_section = document.querySelector("main > section.file-upload > div.preview-container>div.preview");
var image_preview_section = document.querySelector("main>section.file-upload>div.preview-container>div.preview>img");
var preview_text = document.querySelector("main>section.file-upload>div.preview-container>div.preview>p");
var inputs = document.querySelectorAll("main>section.file-upload>fieldset>form>div.form-group>input[type='text']");
var inputs_errors = document.querySelectorAll('main>section.file-upload>fieldset>form>div.form-group>input[type="text"]+p');
var selects = document.querySelectorAll("main>section.file-upload>fieldset>form>div.form-group>select");
var selects_errors = document.querySelectorAll("main>section.file-upload>fieldset>form>div.form-group>select+p");
var textarea_error = document.querySelector("main>section.file-upload>fieldset>form>div.form-group>textarea + p");
var fieldset = document.querySelector("main>section.file-upload>fieldset");

var subcategory_generator = function subcategory_generator(main_category) {
    select_validate(/^(sleeping_products|living_room_products|carpet_products)$/, category_selector);
    var categories = ["sleeping_products", "living_room_products", "carpet_products"];
    var values = [
        ["روبالشی", "روتختی", "ملافه", "کوسن"],
        ["پرده", "رومبلی", "کوسن", "رومیزی"],
        ["فرش", "روفرشی", "تابلوفرش"]
    ];
    var selected_category = main_category.value;

    if (selected_category) {
        subcategory_container.classList.remove("displayNone");
    } else {
        subcategory_container.classList.add("displayNone");
    }

    var _loop = function _loop(i) {
        if (selected_category === categories[i]) {
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

    if (!subcategory_container.classList.contains("displayNone")) {
        fieldset.style.height = "50rem";
        preview_container.style.height = "50rem";
    } else {
        fieldset.style.height = "45rem";
        preview_container.style.height = "45rem";
    }
};

var select_validate = function select_validate(regex, select) {
    for (var i = 0; i < selects.length; i++) {
        if (select === selects[i]) {
            if (select.value === "") {
                select.classList.remove("passed");
                select.classList.remove("failed");
                selects_errors[i].classList.add("displayNone");
            } else {
                if (regex.test(select.value)) {
                    select.classList.add("passed");
                    select.classList.remove("failed");
                    selects_errors[i].classList.add("displayNone");
                } else {
                    select.classList.add("failed");
                    select.classList.remove("passed");
                    selects_errors[i].classList.remove("displayNone");
                }
            }
        }
    }
};

var input_validate = function input_validate(regex, input) {
    for (var i = 0; i < inputs.length; i++) {
        if (input === inputs[i]) {
            if (input.value === "") {
                input.classList.remove("passed");
                input.classList.remove("failed");
                inputs_errors[i].classList.add("displayNone");
            } else {
                if (regex.test(input.value)) {
                    input.classList.add("passed");
                    input.classList.remove("failed");
                    inputs_errors[i].classList.add("displayNone");
                } else {
                    input.classList.add("failed");
                    input.classList.remove("passed");
                    inputs_errors[i].classList.remove("displayNone");
                }
            }
        }
    }
};

var textarea_validation = function textarea_validation(regex, textarea) {
    value = textarea.value;

    if (value === "") {
        textarea.classList.remove("passed");
        textarea.classList.remove("failed");
        textarea_error.classList.add("displayNone");
    } else {
        if (regex.test(value)) {
            textarea.classList.add("passed");
            textarea.classList.remove("failed");
            textarea_error.classList.add("displayNone");
        } else {
            textarea.classList.add("failed");
            textarea.classList.remove("passed");
            textarea_error.classList.remove("displayNone");
        }
    }
};

var resize = function resize() {
    if (window.innerWidth < 560) {
        form_container.classList.remove("container");
        form_container.classList.add("container-fluid");
    } else {
        form_container.classList.remove("container-fluid");
        form_container.classList.add("container");
    }
};

window.addEventListener("resize", resize);
window.addEventListener("load", resize); // image preview:

var preview = function preview(event) {
    var src = URL.createObjectURL(event.target.files[0]);
    image_preview_section.setAttribute("src", src);
    preview_text.classList.add("displayNone");
};