const close_btn = document.getElementById("noclose");
const modal = document.getElementById("delete-warning");
const modal_center = document.getElementsByClassName("center")[0];
const click_targets = document.getElementsByClassName("target");
console.log(click_targets);
const close = () => {
  modal.classList.add("displayNone");
};
close_btn.addEventListener("click", close);

modal.addEventListener("click", (e) => {
  if (!e.target.classList.contains("target")) {
    close();
  }
});
