"use strict";

var warning = document.querySelector("section.warning"); // browser check:

var browser_array = ["MSIE", "Trident", "Edge"];
var user_agent = navigator.userAgent;

for (var b = 0; b < browser_array.length; b++) {
    if (user_agent.indexOf(browser_array[b]) > -1) {
        warning.classList.remove("displayNone");
        break;
    }
}
