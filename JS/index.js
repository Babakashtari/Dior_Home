const search_li = document.querySelector("header>nav>div.right>ul>li:first-of-type");
const hamburger_button = document.querySelector(".hamburger_button");
const hamburger_spans = hamburger_button.querySelectorAll("span");
const hamburger_opened_menu = document.querySelector("header>nav>ul.hamburger_opened_menu");

// hamburger button animation generator:
hamburger_button.addEventListener("click", () => {
    if (hamburger_spans[0].classList.contains("clicked")) {
        for (let i = 0; i < hamburger_spans.length; i++) {
            hamburger_spans[i].classList.remove("clicked");
        }
        hamburger_opened_menu.style.display = "none";
    } else {
        for (let i = 0; i < hamburger_spans.length; i++) {
            hamburger_spans[i].classList.add("clicked");
        }
        hamburger_opened_menu.style.display = "flex";
    }
});
