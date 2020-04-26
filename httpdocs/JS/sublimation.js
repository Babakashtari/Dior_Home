const images = document.querySelectorAll("main>section.description>article>ul>li>img");

if (window.innerHeight <= 576) {
  for (let i = 0; i < images.length; i++) {
    images[i].classList.remove("right");
    images[i].classList.remove("left");
  }
}
