const warning = document.querySelector("section.warning");
const site_header = document.querySelector("header");
const footer_img = document.querySelector("footer>img");
// browser check:
const browser_array = ["MSIE", "Trident", "Edge"];
const user_agent = navigator.userAgent;
for (let b = 0; b < browser_array.length; b++) {
  if (user_agent.indexOf(browser_array[b]) > -1) {
    console.log("for rest");
    warning.classList.remove("displayNone");
    if (site_header.classList.contains("sticky-top")) {
      setInterval(() => {
        site_header.classList.remove("sticky-top");
        site_header.style.zIndex = -1;
        footer_img.style.zIndex = 0;
      }, 1);
    }
    break;
  }
}
