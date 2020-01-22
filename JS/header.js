const head = document.querySelector("body>header");
const main = document.querySelector("main");
const footer = document.querySelector("footer");
const search_li = document.querySelector("header>nav>div.right>ul>li:first-of-type");
const header_menu_links = document.querySelectorAll("header>nav>div>ul>li>a");
const hamburger_button = document.querySelector(".hamburger_button");
const hamburger_spans = hamburger_button.querySelectorAll("span");
const hamburger_opened_menu = document.querySelector("section>ul.hamburger_opened_menu");
const hamburger_opened_menu_li = hamburger_opened_menu.querySelectorAll("li");
const search_lists = document.querySelectorAll(".search");
const search_link = search_lists[0].querySelector("a");
const search_input = search_lists[1].querySelector("input");
const modal_box = document.querySelector("div.modal_box");
const search_close_span = document.querySelector("div.modal_box > span.close");
const modal_box_search = document.querySelector('div.modal_box>div.modal_content>form>input[type="search"]');
const logo = document.querySelector(".logo>img");
const logo_paragraph = document.querySelector(".logo>p");
const jumbotron = document.querySelector("div.jumbotron");
const products_collapse_menu = document.querySelector("header>nav>div.collapse");
const products_collapse_cards = products_collapse_menu.querySelectorAll("div.card");
const products_collapse_headers = products_collapse_menu.querySelectorAll("div.card>div.card-header");
const products_collapse_bodies = products_collapse_menu.querySelectorAll("div.card>div.card-body");
const products_opening_tab = document.querySelector("header>nav>div.left>ul>li>a#products_link");
const products_collapse_card_body_links = products_collapse_menu.querySelectorAll("div.card>div.card-body>ul>li>a");
const products_collapse_card_body_list_items = products_collapse_menu.querySelectorAll("div.card>div.card-body>ul>li");
const products_collapse_card_header_links = products_collapse_menu.querySelectorAll("div.card > div.card-header>a");

console.log(header_menu_links);
// for closing the products menu:
(() => {
    for (let i = 0; i < products_collapse_card_body_links.length; i++) {
        products_collapse_card_body_links[i].classList.add("products-closable");
        products_collapse_card_body_list_items[i].classList.add("products-closable");
    }
    for (let s = 0; s < products_collapse_card_header_links.length; s++) {
        products_collapse_card_header_links[s].classList.add("products-closable");
    }
})();

// for closing the search modal box:
const search_modal_box_close = () => {
    if (!modal_box.classList.contains("hidden")) {
        modal_box.classList.remove("modal_box_scale");
        setTimeout(() => {
            modal_box.classList.add("hidden");
            search_li.style.visibility = "visible";
        }, 1000);
    }
};

// for opening/closing the products small screens hamburger menu:
const activate_hamburger_menu = () => {
    if (hamburger_spans[0].classList.contains("clicked")) {
        for (let i = 0; i < hamburger_spans.length; i++) {
            hamburger_spans[i].classList.remove("clicked");
        }
        hamburger_opened_menu.classList.remove("appear");
        for (let x = 0; x < hamburger_opened_menu_li.length; x++) {
            hamburger_opened_menu_li[x].style.visibility = "hidden";
        }
        jumbotron.classList.remove("open_menu_translate");
        head.classList.remove("open_menu_translate");
        main.classList.remove("open_menu_translate");
        footer.classList.remove("open_menu_translate");
        logo.style.display = "block";
        logo_paragraph.style.display = "block";
        if (window.innerWidth < 352) {
            for (let l = 0; l < header_menu_links.length; l++) {
                header_menu_links[l].style.display = "block";
            }
        }
    } else {
        for (let i = 0; i < hamburger_spans.length; i++) {
            hamburger_spans[i].classList.add("clicked");
        }
        hamburger_opened_menu.classList.add("appear");
        for (let x = 0; x < hamburger_opened_menu_li.length; x++) {
            setTimeout(() => {
                hamburger_opened_menu_li[x].style.visibility = "visible";
            }, 500);
        }
        jumbotron.classList.add("open_menu_translate");
        head.classList.add("open_menu_translate");
        main.classList.add("open_menu_translate");
        footer.classList.add("open_menu_translate");
        logo.style.display = "none";
        logo_paragraph.style.display = "none";
        if (window.innerWidth < 352) {
            for (let m = 0; m < header_menu_links.length; m++) {
                header_menu_links[m].style.display = "none";
            }
        }
        // closing search modal box when hamburger button is clicked:
        search_modal_box_close();
    }
};
// hamburger button for small screens animation generator:
hamburger_button.addEventListener("click", activate_hamburger_menu);

// search modal open click generator:
(() => {
    const modal_search_generator = () => {
        if (modal_box.classList.contains("hidden")) {
            modal_box.classList.remove("hidden");
            modal_box_search.focus();
            search_li.style.visibility = "hidden";
            setTimeout(() => {
                modal_box.classList.add("modal_box_scale");
            }, 1);
            // close the products hamburger menu if already opened:
            if (hamburger_spans[0].classList.contains("clicked")) {
                activate_hamburger_menu();
            }
        }
    };
    search_input.addEventListener("click", modal_search_generator);
    search_link.addEventListener("click", modal_search_generator);

    // X button in the search modal_box for closing event:
    search_close_span.addEventListener("click", () => {
        search_modal_box_close();
    });
})();
// scroll event:
const showLogo = () => {
    const scrolled_amount = window.scrollY;
    if (scrolled_amount > jumbotron.offsetHeight / 2) {
        logo.style.height = "105%";
        logo.style.boxShadow = "none";
        logo.setAttribute("src", "images/Dior_logo_small.png");
        logo_paragraph.style.transform = "translateX(-50%) scale(1)";
    } else {
        if (window.innerWidth < 690 && window.innerWidth >= 462) {
            logo.style.height = "150%";
        } else if (window.innerWidth < 462) {
            logo.style.height = "100%";
        } else {
            logo.style.height = "200%";
        }
        logo.style.boxShadow = "0 1px 8px white";
        logo.setAttribute("src", "images/Dior_logo.png");
        logo_paragraph.style.transform = "translateX(-50%) scale(0)";
    }
};

window.addEventListener("load", showLogo);
window.addEventListener("scroll", showLogo);

//products menu background-image hover effect
(() => {
    const menu_images_src = [
        "images/products_menu_images/bedroom.jpg",
        "images/products_menu_images/living_room5.jpg",
        "images/products_menu_images/carpet.jpg",
        "images/products_menu_images/taghe3.jpg"
    ];
    for (let i = 0; i < products_collapse_cards.length; i++) {
        products_collapse_cards[i].addEventListener("mouseenter", event => {
            for (let s = 0; s < products_collapse_cards.length; s++) {
                if (event.currentTarget === products_collapse_cards[s]) {
                    products_collapse_menu.style.backgroundImage = "url(" + menu_images_src[s] + ")";
                    products_collapse_headers[s].style.borderBottom = "3px solid red";
                    products_collapse_card_header_links[s].style.color = "red";
                } else {
                    products_collapse_headers[s].style.borderBottom = "3px solid white";
                    products_collapse_card_header_links[s].style.color = "white";
                }
            }
        });
    }
})();

// closing events on outside clicks:
window.addEventListener("click", event => {
    // Products menu closing event:
    if (
        !event.target.classList.contains("products-closable") &&
        !event.target.classList.contains("card") &&
        !event.target.classList.contains("card-body") &&
        !event.target.classList.contains("card-header") &&
        event.target !== products_opening_tab
    ) {
        products_collapse_menu.classList.remove("show");
        products_opening_tab.setAttribute("aria-expanded", false);
        products_opening_tab.classList.add("collapsed");
    }
    //  search modal div closing event:
    if (!event.target.classList.contains("modal-closable")) {
        search_modal_box_close();
    }
    // products hamburger menu for small screens closing event:
    if (!event.target.classList.contains("hamburger-close") && hamburger_spans[0].classList.contains("clicked")) {
        activate_hamburger_menu();
    }
});
