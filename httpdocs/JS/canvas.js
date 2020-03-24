const background_canvas = document.querySelector("html>body>canvas.background-canvas");
const body = document.querySelector("body");
const context = background_canvas.getContext("2d");

background_canvas.width = window.innerWidth;
background_canvas.height = window.innerHeight;

window.addEventListener("resize", () => {
    background_canvas.width = window.innerWidth;
    background_canvas.height = window.innerHeight;
    star_generator();
});

const star_generator = () => {
    for (let i = 0; i < 60; i++) {
        const x = Math.random() * window.innerWidth;
        const y = Math.random() * window.innerHeight;
        const opacity = Math.random();
        context.beginPath();
        context.arc(x, y, 2, 0, Math.PI * 2);
        context.fillStyle = `rgba(255, 255, 255, ${opacity})`;
        context.fill();
        window.addEventListener("load", () => {});
    }
};
star_generator();
