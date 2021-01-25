"use strict";

var footer = document.querySelector("body>div.links");

var disappear = function disappear() {
    if (window.innerHeight < 374) {
        footer.style.display = "none";
    } else {
        footer.style.display = "block";
    }
};

window.addEventListener("load", disappear);
window.addEventListener("resize", disappear);