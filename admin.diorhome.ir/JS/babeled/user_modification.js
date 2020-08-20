"use strict";

var close_btn = document.getElementById("noclose");
var modal = document.getElementById("warning");
var modal_center = document.getElementsByClassName("center")[0];

var close = function close() {
    modal.classList.add("displayNone");
};

close_btn.addEventListener("click", close);
modal.addEventListener("click", function (e) {
    if (!e.target.classList.contains("target")) {
        close();
    }
});