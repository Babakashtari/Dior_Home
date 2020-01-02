const search_li = document.querySelector("header>nav>div.right>ul>li:first-of-type");
const search_input_field = search_li.querySelector("input");
const search_input_button = search_li.querySelector("i");
const hamburger_button = document.querySelector(".hamburger_button");
const hamburger_spans = hamburger_button.querySelectorAll("span");
console.log(hamburger_spans);

const header_hamburger_button_activator = () => {
  if (hamburger_spans[0].classList.contains("clicked")) {
    for (let i = 0; i < hamburger_spans.length; i++) {
      hamburger_spans[i].classList.remove("clicked");
    }
  } else {
    for (let i = 0; i < hamburger_spans.length; i++) {
      hamburger_spans[i].classList.add("clicked");
    }
  }
};

hamburger_button.addEventListener("click", header_hamburger_button_activator);

const image = document.querySelector("header>nav>div>img");
const header = document.querySelector("header");

const header_margin_generator = () => {
  // header.style.marginTop = image.width / 2 + 12 + "px";
  //   header.style.height = image.height / 2 + "px";
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
