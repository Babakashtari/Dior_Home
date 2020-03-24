"use strict";

var background_canvas = document.querySelector("html>body>canvas.background-canvas");
var body = document.querySelector("body");
var context = background_canvas.getContext("2d");
background_canvas.width = window.innerWidth;
background_canvas.height = window.innerHeight;
window.addEventListener("resize", function() {
    background_canvas.width = window.innerWidth;
    background_canvas.height = window.innerHeight;
    star_generator();
});

var star_generator = function star_generator() {
    for (var i = 0; i < 60; i++) {
        var x = Math.random() * window.innerWidth;
        var y = Math.random() * window.innerHeight;
        var opacity = Math.random();
        context.beginPath();
        context.arc(x, y, 2, 0, Math.PI * 2);
        context.fillStyle = "rgba(255, 255, 255, ".concat(opacity, ")");
        context.fill();
        window.addEventListener("load", function() {});
    }
};

star_generator();
