const search_li = document.querySelector("header>nav>div.right>ul>li:first-of-type");
const hamburger_button = document.querySelector(".hamburger_button");
const hamburger_spans = hamburger_button.querySelectorAll("span");
const hamburger_opened_menu = document.querySelector("header>nav>ul.hamburger_opened_menu");
const search_lists = document.querySelectorAll(".search");
const modal_box = document.querySelector("div.modal_box");
const search_close_span = document.querySelector("div.modal_box > span.close");
const modal_box_search = document.querySelector(
  'div.modal_box>div.modal_content>form>input[type="search"]'
);
const logo = document.querySelector(".logo>img");
const logo_paragraph = document.querySelector(".logo>p");
const jumbotron = document.querySelector("div.jumbotron");
const products_collapse_menu = document.querySelector("header>nav>div.collapse");
const products_collapse_cards = products_collapse_menu.querySelectorAll("div.card");
const products_collapse_headers = products_collapse_menu.querySelectorAll(
  "div.card>div.card-header"
);
const products_collapse_bodies = products_collapse_menu.querySelectorAll("div.card>div.card-body");
const products_opening_tab = document.querySelector("header>nav>div.left>ul>li>a#products_link");
const products_collapse_card_body_links = products_collapse_menu.querySelectorAll(
  "div.card>div.card-body>ul>li>a"
);
const products_collapse_card_body_list_items = products_collapse_menu.querySelectorAll(
  "div.card>div.card-body>ul>li"
);
const products_collapse_card_header_links = products_collapse_menu.querySelectorAll(
  "div.card > div.card-heaer"
);
// for closing the products menu:
(() => {
  for (let i = 0; i < products_collapse_card_body_links.length; i++) {
    products_collapse_card_body_links[i].classList.add("products-closable");
    products_collapse_card_body_list_items[i].classList.add("products-closable");
  }
  for (let s = 0; s < products_collapse_card_header_links; s++) {
    products_collapse_card_header_links[s].classList.add("products-closable");
  }
})();

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
const showLogo = () => {
  const scrolled_amount = window.scrollY;
  if (scrolled_amount > jumbotron.offsetHeight / 2) {
    logo.style.height = "105%";
    logo.style.boxShadow = "none";
    logo.setAttribute("src", "images/Dior_logo_small.png");
    logo_paragraph.style.transform = "translateX(-50%) scale(1)";
  } else {
    logo.style.height = "200%";
    logo.style.boxShadow = "0 1px 8px white";
    logo.setAttribute("src", "images/Dior_logo.png");
    logo_paragraph.style.transform = "translateX(-50%) scale(0)";
  }
};

window.addEventListener("load", showLogo);
window.addEventListener("scroll", showLogo);

//products menu hover effect
(() => {
  const menu_images_src = [
    "images/products_menu_images/bedroom.jpg",
    "images/products_menu_images/living_room2.jpg",
    "images/products_menu_images/stationery1.jpg",
    "images/products_menu_images/kitchen.jpg",
    "images/products_menu_images/chal.jpg",
    "images/products_menu_images/thinking_room.jpg"
  ];
  for (let i = 0; i < products_collapse_cards.length; i++) {
    products_collapse_cards[i].addEventListener("mouseenter", event => {
      for (let s = 0; s < products_collapse_cards.length; s++) {
        if (event.currentTarget === products_collapse_cards[s]) {
          products_collapse_menu.style.backgroundImage = "url(" + menu_images_src[s] + ")";
        }
      }
    });
  }
})();

// closing events on outside clicks:
window.addEventListener("click", event => {
  // products menu closing event:
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
});
