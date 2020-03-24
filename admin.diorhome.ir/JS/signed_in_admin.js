const users_top_div_checkboxes = document.querySelectorAll('main>section.users-info>div.search_criteria>div>span>input[type="checkbox"]');
const users_top_div_first_9_checkboxes = document.querySelectorAll(
    "main>section.users-info>div.search_criteria>div>span:not(.users-checkboxes)>input[type='checkbox']"
);
const users_search_form_first_9_divs = document.querySelectorAll("main>section.users-info>form>div.form-group");
const bottom_3_top_div_boxes = document.querySelectorAll('main>section.users-info>div.search_criteria>div>span>input[name="users-checkboxes"]');
const bottom_3_form_checkboxes = document.querySelectorAll('main>section.users-info>form>div.checkbox>label>input[type="checkbox"]');
const users_search_submit_button = document.querySelector('main>section.users-info>form>button[type="submit"]');
const products_search_submit_button = document.querySelector('main>section.products-info>form>button[type="submit"]');
const users_search_form_container = document.querySelector("main>section.users-info>form");
const products_search_form_container = document.querySelector("main>section.products-info>form");
const products_search_top_div_boxes = document.querySelectorAll('main>section.products-info>div.search_criteria>div>span>input[type="checkbox"]');
const products_search_form_divs = document.querySelectorAll("main>section.products-info>form>div.form-group");

// console.log(products_search_form_container);
// تیک زدن سه چک باکس ادمین، خبرنامه و تایید ایمیل در فیلد های فرم جستجوی کاربر:
const checker = event => {
    for (let i = 0; i < bottom_3_top_div_boxes.length; i++) {
        if (event.target === bottom_3_top_div_boxes[i]) {
            if (event.target.checked) {
                bottom_3_form_checkboxes[i].checked = true;
            } else {
                if (bottom_3_top_div_boxes[i].checked) {
                    bottom_3_form_checkboxes[i].checked = true;
                } else {
                    bottom_3_form_checkboxes[i].checked = false;
                }
            }
        }
    }
};

// برداشتن تیک چک باکس ها وقتی صفحه لود می شود:
for (let i = 0; i < bottom_3_top_div_boxes.length; i++) {
    bottom_3_top_div_boxes[i].addEventListener("change", checker);
}
const remove_ticks = array => {
    for (let i = 0; i < array.length; i++) {
        array[i].checked = false;
    }
};
document.addEventListener("load", remove_ticks(users_top_div_first_9_checkboxes));
document.addEventListener("load", remove_ticks(products_search_top_div_boxes));

// ظاهر شدن فیلد سرچ مربوطه در فرم بعد از تیک زدن چک باکس مربوطه در قسمت جستجوی کاربر:
const user_search_input_appear = event => {
    for (let i = 0; i < users_top_div_first_9_checkboxes.length; i++) {
        if (event.target === users_top_div_first_9_checkboxes[i]) {
            if (event.target.checked) {
                users_search_form_first_9_divs[i].classList.remove("displayNone");
            } else {
                users_search_form_first_9_divs[i].classList.add("displayNone");
            }
        }
    }
};
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

const function_loader = event => {
    user_search_input_appear(event);
    users_form_submit_button_appear();
};
for (let s = 0; s < users_top_div_first_9_checkboxes.length; s++) {
    users_top_div_first_9_checkboxes[s].addEventListener("change", function_loader);
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
