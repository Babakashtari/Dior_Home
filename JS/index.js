const search_li = document.querySelector("header>nav>div.right>ul>li:first-of-type");
const hamburger_button = document.querySelector(".hamburger_button");
const hamburger_spans = hamburger_button.querySelectorAll("span");
const hamburger_opened_menu = document.querySelector("header>nav>ul.hamburger_opened_menu");
const search_lists = document.querySelectorAll(".search");
const modal_box = document.querySelector('div.modal_box');
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

// search modal click generator:
const modal_search = () => {
  for (let i = 0; i < search_lists.length; i++) {
    search_lists[i].addEventListener("click", () => {
      if(modal_box.classList.contains('hidden')){
        modal_box.classList.remove('hidden');
      }
    });
  }
};
modal_search();
