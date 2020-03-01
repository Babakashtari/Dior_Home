const warning = document.querySelector("main>section.warning");

// browser check:
const browser_array = ["MSIE", "Trident", "Edge"];
const user_agent = navigator.userAgent;
for (let b = 0; b < browser_array.length; b++) {
    if (user_agent.indexOf(browser_array[b]) > -1) {
        warning.classList.remove("displayNone");
        if (head.classList.contains("sticky-top")) {
            setInterval(() => {
                head.classList.remove("sticky-top");
                head.style.zIndex = -1;
            }, 1);
        }
        break;
    }
}
