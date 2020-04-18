const warning = document.querySelector("section.warning");
// browser check:
const browser_array = ["MSIE", "Trident", "Edge"];
const user_agent = navigator.userAgent;
for (let b = 0; b < browser_array.length; b++) {
    if (user_agent.indexOf(browser_array[b]) > -1) {
        warning.classList.remove("displayNone");
        break;
    }
}
