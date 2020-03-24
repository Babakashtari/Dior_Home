"use strict";

var warning = document.querySelector("section.warning");
var site_header = document.querySelector("header");
var footer_img = document.querySelector("footer>img"); // browser check:

var browser_array = ["MSIE", "Trident", "Edge"];
var user_agent = navigator.userAgent;

for (var b = 0; b < browser_array.length; b++) {
    if (user_agent.indexOf(browser_array[b]) > -1) {
        warning.classList.remove("displayNone");

        if (site_header.classList.contains("sticky-top")) {
            setInterval(function() {
                site_header.classList.remove("sticky-top");
                site_header.style.zIndex = 0;
                footer_img.style.zIndex = 0;
            }, 1);
        }

        break;
    }
}
