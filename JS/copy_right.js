const footer = document.querySelector("body>div.links");
const disappear = () => {
  if (window.innerHeight < 374) {
    footer.style.display = "none";
  } else {
    footer.style.display = "block";
  }
};

window.addEventListener("load", disappear);
window.addEventListener("resize", disappear);
