"use strict";

var footer_container = document.querySelector("footer");
var footer_image = document.querySelector("footer>img");
var devider = document.querySelector("footer>div#devider");
var footer_tabs = document.querySelectorAll("footer>div#devider>div>p>span");
var footer_tab_menus = document.querySelectorAll("footer>section");
var footer_second_menu_section = document.querySelector("footer>section:nth-of-type(2)");

var margin_generator = function margin_generator() {
    footer_container.style.paddingTop = footer_image.clientWidth / 2 + "px";
};

var container_fluid_generator = function container_fluid_generator() {
    if (window.innerWidth < 991 && window.innerWidth > 768 && footer_tabs[1].classList.contains("bg-primary")) {
        footer_second_menu_section.classList.add("container-fluid");
        devider.classList.add("container-fluid");

        if (devider.classList.contains("container")) {
            devider.classList.remove("container");
        }

        if (footer_second_menu_section.classList.contains("container")) {
            footer_second_menu_section.classList.remove("container");
        }
    } else {
        footer_second_menu_section.classList.add("container");
        devider.classList.add("container");

        if (footer_second_menu_section.classList.contains("container-fluid")) {
            footer_second_menu_section.classList.remove("container-fluid");
            devider.classList.remove("container-fluid");
        }
    }
};

window.addEventListener("load", function() {
    margin_generator();
    container_fluid_generator();
});
window.addEventListener("resize", function() {
    margin_generator();
    container_fluid_generator();
});

var footer_tab_changer = function footer_tab_changer() {
    for (var i = 0; i < footer_tabs.length; i++) {
        if (footer_tabs[i].classList.contains("bg-primary")) {
            footer_tab_menus[i].style.display = "block";
        } else {
            footer_tab_menus[i].style.display = "none";
        }

        footer_tabs[i].addEventListener("click", function(e) {
            for (var s = 0; s < footer_tabs.length; s++) {
                if (e.currentTarget === footer_tabs[s]) {
                    footer_tabs[s].classList.add("bg-primary");
                    footer_tab_menus[s].style.display = "block";
                } else {
                    footer_tabs[s].classList.remove("bg-primary");
                    footer_tab_menus[s].style.display = "none";
                }
            }

            container_fluid_generator();
        });
    }
};

footer_tab_changer();
