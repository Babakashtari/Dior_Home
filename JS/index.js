const search_div = document.querySelector("header>nav>div.right>ul>li:first-of-type");
const search_button = document.querySelector("header>nav>div.right>ul>li>input");
const btn = document.createElement("Button");

const search_loop_generator = () => {
    if (window.innerWidth < 690) {
        // removing search input:
        search_div.removeChild(search_button);
        // adding search_loop:
        btn.innerHTML = "<i class='fa fa-search' ></i>";
        search_div.appendChild(btn);
    }
};

window.addEventListener("load", search_loop_generator);
// window.addEventListener("resize", search_loop_generator);
