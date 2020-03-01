const user_agent = navigator.userAgent;
const warning = document.querySelector("main>section.warning");
console.log(user_agent);

if (user_agent.search("trident") > 0) {
  warning.classList.remove("displayNone");
} else {
  warning.classList.add("displayNone");
}
