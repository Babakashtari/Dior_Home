const footer_container = document.querySelector("footer");
const footer_image = document.querySelector("footer>img");
// const devider = document.querySelector("footer>div#devider");
const footer_tabs = document.querySelectorAll("footer>div#devider>div>p>span");
const footer_tab_menus = document.querySelectorAll("footer>section");
// console.log(devider);

const margin_generator = () => {
    footer_container.style.paddingTop = footer_image.clientWidth / 2 + "px";
};

window.addEventListener("load", margin_generator);
window.addEventListener("resize", margin_generator);

const footer_tab_changer = () => {
    for (let i = 0; i < footer_tabs.length; i++) {
        if (footer_tabs[i].classList.contains("bg-primary")) {
            footer_tab_menus[i].style.display = "block";
        } else {
            footer_tab_menus[i].style.display = "none";
        }
        footer_tabs[i].addEventListener("click", e => {
            for (let s = 0; s < footer_tabs.length; s++) {
                if (e.currentTarget === footer_tabs[s]) {
                    footer_tabs[s].classList.add("bg-primary");
                    footer_tab_menus[s].style.display = "block";
                } else {
                    footer_tabs[s].classList.remove("bg-primary");
                    footer_tab_menus[s].style.display = "none";
                }
            }
        });
    }
};
footer_tab_changer();
