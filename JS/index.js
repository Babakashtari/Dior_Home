const search_li = document.querySelector("header>nav>div.right>ul>li:first-of-type");
const search_input_field = search_li.querySelector("input");
const search_input_button = search_li.querySelector("i");

const image = document.querySelector("header>nav>div>img");
const header = document.querySelector("header");

const header_margin_generator = () => {
    header.style.marginTop = image.width / 2 + 12 + "px";
    header.style.height = image.height / 2 + "px";
};
const search_loop_generator = () => {
    if (window.innerWidth < 690) {
        if (!search_input_field.classList.contains("hidden")) {
            search_input_field.classList.add("hidden");
            if (search_input_button.classList.contains("hidden")) {
                search_input_button.classList.remove("hidden");
            }
        }
    } else {
        if (!search_input_button.classList.contains("hidden")) {
            search_input_button.classList.add("hidden");
            if (search_input_field.classList.contains("hidden")) {
                search_input_field.classList.remove("hidden");
            }
        }
    }
    header_margin_generator();
};
window.addEventListener("load", search_loop_generator);
window.addEventListener("resize", search_loop_generator);
