const search_li = document.querySelector("header>nav>div.right>ul>li:first-of-type");
const hamburger_button = document.querySelector(".hamburger_button");
const hamburger_spans = hamburger_button.querySelectorAll("span");
const hamburger_opened_menu = document.querySelector("header>nav>ul.hamburger_opened_menu");
const search_lists = document.querySelectorAll(".search");
const modal_box = document.querySelector("div.modal_box");
const search_close_span = document.querySelector("div.modal_box > span.close");
const modal_box_search = document.querySelector('div.modal_box>div.modal_content>form>input[type="search"]');
const logo = document.querySelector(".logo>img");
const jumbotron = document.querySelector("div.jumbotron");

console.log(logo);
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
        if (!modal_box.classList.contains("hidden")) {
            modal_box.classList.add("hidden");
        }
    }
});

// search modal open click generator:
(() => {
    for (let i = 0; i < search_lists.length; i++) {
        search_lists[i].addEventListener("click", () => {
            if (modal_box.classList.contains("hidden")) {
                modal_box.classList.remove("hidden");
                modal_box_search.focus();
                search_li.style.visibility = "hidden";
                if (hamburger_spans[0].classList.contains("clicked")) {
                    for (let i = 0; i < hamburger_spans.length; i++) {
                        hamburger_spans[i].classList.remove("clicked");
                    }
                    hamburger_opened_menu.style.display = "none";
                }
            }
        });
    }
    search_close_span.addEventListener("click", () => {
        if (!modal_box.classList.contains("hidden")) {
            modal_box.classList.add("hidden");
            search_li.style.visibility = "visible";
        }
    });
})();
// scroll event:
window.addEventListener("scroll", () => {
    const scrolled_area = window.scrollY;
    if (scrolled_area > jumbotron.offsetHeight / 2) {
        logo.style.width = "30%";
        logo.setAttribute("src", "images/Dior_logo_small.png");
    } else {
        logo.style.width = "80%";
        logo.setAttribute("src", "images/Dior_logo.png");
    }
});
