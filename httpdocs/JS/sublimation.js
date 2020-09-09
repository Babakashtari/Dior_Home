const images = document.querySelectorAll("main>section.description>article>ul>li>img");

// we also pay attention to window innerheight so that landscape view of a phone doesn't crop images out of the screen in a bad way:
if (window.innerWidth <= 576 && window.innerHeight <= 576) {
  for (let i = 0; i < images.length; i++) {
    images[i].classList.remove("right");
    images[i].classList.remove("left");
  }
}