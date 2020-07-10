const close_btn = document.getElementById("noclose");
const modal = document.getElementById("warning");
const modal_center = document.getElementsByClassName("center")[0];

const close = () => {
  modal.classList.add("displayNone");
};
close_btn.addEventListener("click", close);

modal.addEventListener("click", (e) => {
  if (!e.target.classList.contains("target")) {
    close();
  }
});