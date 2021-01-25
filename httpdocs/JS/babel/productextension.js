"use strict";

// copying page link to clipboard: 
var page_link = document.getElementsByName("page-link")[0];
var copy_button = document.getElementById("copy_button");
copy_button.addEventListener("click", function () {
    page_link.select();
    document.execCommand("copy");
});