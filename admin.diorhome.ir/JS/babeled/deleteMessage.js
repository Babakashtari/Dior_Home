"use strict";

var spinner = document.querySelector('div.spinner-border');
var result = document.querySelector('div.result');
setTimeout(function () {
    spinner.classList.add('displayNone');
    result.classList.remove('displayNone');
}, 2000);