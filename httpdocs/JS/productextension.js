// copying page link to clipboard: 
const page_link = document.getElementsByName("page-link")[0];
const copy_button = document.getElementById("copy_button");

copy_button.addEventListener("click", () => {
    page_link.select();
    document.execCommand("copy");
});