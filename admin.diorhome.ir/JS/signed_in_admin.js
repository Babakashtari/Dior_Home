const users_top_div_checkboxes = document.querySelectorAll('main>section.users-info>div.search_criteria>div>span>input[type="checkbox"]');
const users_search_form_divs = document.querySelectorAll("main>section.users-info>form>div.form-group");
const bottom_3_form_checkboxes = document.querySelectorAll('main>section.users-info>form>div.checkbox>label>input[type="checkbox"]');
const users_search_submit_button = document.querySelector('main>section.users-info>form>input[type="submit"]');
const products_search_submit_button = document.querySelector('main>section.products-info>form>input[type="submit"]');
const users_search_form_container = document.querySelector("main>section.users-info>form");
const products_search_form_container = document.querySelector("main>section.products-info>form");
const products_search_top_div_boxes = document.querySelectorAll('main>section.products-info>div.search_criteria>div>span>input[type="checkbox"]');
const products_search_form_divs = document.querySelectorAll("main>section.products-info>form>div.form-group");
const users_error_messages = document.querySelectorAll("main>section.users-info>form>div.form-group>p");
const users_inputs = document.querySelectorAll("main>section.users-info>form>div.form-group>input");
const users_search_result_div = document.querySelector("main>section.users-info>div.result");

// ظاهر شدن فیلد سرچ مربوطه در فرم بعد از تیک زدن چک باکس مربوطه در قسمت جستجوی کاربر:
const user_search_input_appear = event => {
    for (let i = 0; i < users_top_div_checkboxes.length; i++) {
        if (event.target === users_top_div_checkboxes[i]) {
            if (event.target.checked) {
                users_search_form_divs[i].classList.remove("displayNone");
            } else {
                users_search_form_divs[i].classList.add("displayNone");
            }
        }
    }
};
const user_search_input_appear2 = () => {
    for (let i = 0; i < users_top_div_checkboxes.length; i++) {
        if (users_top_div_checkboxes[i].checked) {
            users_search_form_divs[i].classList.remove("displayNone");
        } else {
            users_search_form_divs[i].classList.add("displayNone");
        }
    }
};

user_search_input_appear2();
// ظاهر شدن دکمه جستجو بعد از فعال شدن حداقل یک فیلد توسط کاربر ادمین:
const users_form_submit_button_appear = () => {
    let message = "";
    for (let l = 0; l < users_top_div_checkboxes.length; l++) {
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

const function_loader = event => {
    user_search_input_appear(event);
    users_form_submit_button_appear();
};
for (let s = 0; s < users_top_div_checkboxes.length; s++) {
    users_top_div_checkboxes[s].addEventListener("change", function_loader);
}

// ظاهر شدن فیلد سرچ مربوطه در فرم بعد از تیک زدن چک باکس مربوطه در قسمت جستجوی محصول:
const products_search_input_appear = event => {
    for (let i = 0; i < products_search_top_div_boxes.length; i++) {
        if (event.target === products_search_top_div_boxes[i]) {
            if (event.target.checked) {
                products_search_form_divs[i].classList.remove("displayNone");
            } else {
                products_search_form_divs[i].classList.add("displayNone");
            }
        }
    }
};

// ظاهر شدن دکمه جستجو بعد از فعال شدن حداقل یک فیلد توسط کاربر ادمین:
const products_form_submit_button_appear = () => {
    let message = "";
    for (let l = 0; l < products_search_top_div_boxes.length; l++) {
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

const function_loader2 = event => {
    products_search_input_appear(event);
    products_form_submit_button_appear();
};
for (let s = 0; s < products_search_top_div_boxes.length; s++) {
    products_search_top_div_boxes[s].addEventListener("change", function_loader2);
}

const validate = (regex, input) => {
    for (let i = 0; i < users_error_messages.length; i++) {
        if (input === users_inputs[i]) {
            if (input.value === "") {
                input.classList.remove("passed");
                input.classList.remove("failed");
                users_error_messages[i].classList.add("displayNone");
            } else {
                const validation_result = regex.test(input.value);
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
