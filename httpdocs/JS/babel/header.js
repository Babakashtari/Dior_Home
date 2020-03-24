"use strict";

var head = document.querySelector("body>header");
var main = document.querySelector("main");
var footer = document.querySelector("footer");
var search_li = document.querySelector("header>nav>div.right>ul>li:first-of-type");
var header_menu_links = document.querySelectorAll("header>nav>div>ul>li>a");
var hamburger_button = document.querySelector(".hamburger_button");
var hamburger_spans = hamburger_button.querySelectorAll("span");
var hamburger_opened_menu = document.querySelector("section>ul.hamburger_opened_menu");
var hamburger_opened_menu_li = hamburger_opened_menu.querySelectorAll("li");
var search_lists = document.querySelectorAll(".search");
var search_link = search_lists[0].querySelector("a");
var search_input = search_lists[1].querySelector("input");
var modal_box = document.querySelector("div.modal_box");
var search_close_span = document.querySelector("div.modal_box > span.close");
var modal_box_search = document.querySelector('div.modal_box>div.modal_content>form>input[type="search"]');
var logo = document.querySelector(".logo>img");
var logo_paragraph = document.querySelector(".logo>p");
var jumbotron = document.querySelector("div.jumbotron");
var products_collapse_menu = document.querySelector("header>nav>div.collapse");
var products_collapse_cards = products_collapse_menu.querySelectorAll("div.card");
var products_collapse_headers = products_collapse_menu.querySelectorAll("div.card>div.card-header");
var products_collapse_bodies = products_collapse_menu.querySelectorAll("div.card>div.card-body");
var products_opening_tab = document.querySelector("header>nav>div.left>ul>li>a#products_link");
var products_collapse_card_body_links = products_collapse_menu.querySelectorAll("div.card>div.card-body>ul>li>a");
var products_collapse_card_body_list_items = products_collapse_menu.querySelectorAll("div.card>div.card-body>ul>li");
var products_collapse_card_header_links = products_collapse_menu.querySelectorAll("div.card > div.card-header>a"); // for closing the products menu:

(function() {
    for (var i = 0; i < products_collapse_card_body_links.length; i++) {
        products_collapse_card_body_links[i].classList.add("products-closable");
        products_collapse_card_body_list_items[i].classList.add("products-closable");
    }

    for (var s = 0; s < products_collapse_card_header_links.length; s++) {
        products_collapse_card_header_links[s].classList.add("products-closable");
    }
})(); // for closing the search modal box:

var search_modal_box_close = function search_modal_box_close() {
    if (!modal_box.classList.contains("hidden")) {
        modal_box.classList.remove("modal_box_scale");
        setTimeout(function() {
            modal_box.classList.add("hidden");
            search_li.style.visibility = "visible";
        }, 1000);
        main.classList.remove("hidden");
        footer.classList.remove("hidden");
    }
}; // for opening/closing the products small screens hamburger menu:

var activate_hamburger_menu = function activate_hamburger_menu() {
    if (hamburger_spans[0].classList.contains("clicked")) {
        for (var i = 0; i < hamburger_spans.length; i++) {
            hamburger_spans[i].classList.remove("clicked");
        }

        hamburger_opened_menu.classList.remove("appear");

        for (var x = 0; x < hamburger_opened_menu_li.length; x++) {
            hamburger_opened_menu_li[x].style.visibility = "hidden";
        }

        jumbotron.classList.remove("open_menu_translate");
        head.classList.remove("open_menu_translate");
        main.classList.remove("open_menu_translate");
        footer.classList.remove("open_menu_translate");
        logo.style.display = "block";
        logo_paragraph.style.display = "block";

        if (window.innerWidth < 352) {
            for (var l = 0; l < header_menu_links.length; l++) {
                header_menu_links[l].style.display = "block";
            }
        }
    } else {
        for (var _i = 0; _i < hamburger_spans.length; _i++) {
            hamburger_spans[_i].classList.add("clicked");
        }

        hamburger_opened_menu.classList.add("appear");

        var _loop = function _loop(_x) {
            setTimeout(function() {
                hamburger_opened_menu_li[_x].style.visibility = "visible";
            }, 500);
        };

        for (var _x = 0; _x < hamburger_opened_menu_li.length; _x++) {
            _loop(_x);
        }

        jumbotron.classList.add("open_menu_translate");
        head.classList.add("open_menu_translate");
        main.classList.add("open_menu_translate");
        footer.classList.add("open_menu_translate");
        logo.style.display = "none";
        logo_paragraph.style.display = "none";

        if (window.innerWidth < 352) {
            for (var m = 0; m < header_menu_links.length; m++) {
                header_menu_links[m].style.display = "none";
            }
        } // closing search modal box when hamburger button is clicked:

        search_modal_box_close();
    }
}; // hamburger button for small screens animation generator:

hamburger_button.addEventListener("click", activate_hamburger_menu); // search modal open click generator:

(function() {
    var modal_search_generator = function modal_search_generator() {
        if (modal_box.classList.contains("hidden")) {
            modal_box.classList.remove("hidden");
            modal_box_search.focus();
            search_li.style.visibility = "hidden"; // document.body.scrollTop = 0;
            // document.documentElement.scrollTop = 0;

            main.classList.add("hidden");
            footer.classList.add("hidden");
            setTimeout(function() {
                modal_box.classList.add("modal_box_scale");
            }, 1); // close the products hamburger menu if already opened:

            if (hamburger_spans[0].classList.contains("clicked")) {
                activate_hamburger_menu();
            }
        }
    };

    search_input.addEventListener("click", modal_search_generator);
    search_link.addEventListener("click", modal_search_generator); // X button in the search modal_box for closing event:

    search_close_span.addEventListener("click", function() {
        search_modal_box_close();
    });
})(); // scroll event:

var showLogo = function showLogo() {
    var scrolled_amount = window.scrollY;

    if (scrolled_amount > jumbotron.offsetHeight / 2) {
        logo.style.height = "105%";
        logo.style.boxShadow = "none";
        logo.setAttribute("src", "images/Dior_logo_small.jpg");
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
        logo.setAttribute("src", "images/Dior_logo.jpg");
        logo_paragraph.style.transform = "translateX(-50%) scale(0)";
    }
};

var no_sticky_top = function no_sticky_top() {
    // removing sticky positioning for small screens:
    if (window.innerWidth < 690) {
        head.classList.contains("sticky-top") && head.classList.remove("sticky-top");
    } else {
        !head.classList.contains("sticky-top") && head.classList.add("sticky-top");
    }
};

var page_loaded = function page_loaded() {
    showLogo();
    no_sticky_top();
};

window.addEventListener("load", page_loaded);
window.addEventListener("scroll", showLogo);
window.addEventListener("resize", no_sticky_top); //products menu background-image hover effect

(function() {
    var menu_images_src = [
        "images/products_menu_images/bedroom.jpg",
        "images/products_menu_images/living_room5.jpg",
        "images/products_menu_images/carpet.jpg",
        "images/products_menu_images/taghe3.jpg"
    ];

    for (var i = 0; i < products_collapse_cards.length; i++) {
        products_collapse_cards[i].addEventListener("mouseenter", function(event) {
            for (var s = 0; s < products_collapse_cards.length; s++) {
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
})(); // closing events on outside clicks:

window.addEventListener("click", function(event) {
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
    } //  search modal div closing event:

    if (!event.target.classList.contains("modal-closable")) {
        search_modal_box_close();
    } // products hamburger menu for small screens closing event:

    if (!event.target.classList.contains("hamburger-close") && hamburger_spans[0].classList.contains("clicked")) {
        activate_hamburger_menu();
    }
});
