"use strict";

var spinner = document.getElementsByClassName('spinner-border')[0];
var tick = document.getElementsByClassName('tick')[0];
var delete_message = document.getElementsByClassName('delete-message')[0];

var tick_animation = function tick_animation() {
    setTimeout(function () {
        spinner.classList.add('displayNone');
        tick.classList.remove('displayNone');
        delete_message.classList.remove('displayNone');
    }, 1000);
};

tick_animation();