const inputs = document.querySelectorAll("body>section.background-image>fieldset>form>div.form-group>input");
const errors = document.querySelectorAll("body > section.background-image > fieldset > form > div.form-group > p");
const section = document.querySelector("body > section.background-image");

const validate = (regex, input) => {
    const value = input.value;
    // if the input value is not empty:
    if (value !== "") {
        // when the inserted input value is valid:
        if (regex.test(value)) {
            input.style.border = "3px solid green";
            for (let i = 0; i < inputs.length; i++) {
                if (inputs[i] === input) {
                    errors[i].classList.add("displayNone");
                }
            }
            // when the inserted input value is not valid:
        } else {
            input.style.border = "3px solid red";
            for (let i = 0; i < inputs.length; i++) {
                if (inputs[i] === input) {
                    errors[i].classList.remove("displayNone");
                }
            }
        }
        // if the input value is empty:
    } else {
        input.style.border = "3px solid transparent";
        for (let i = 0; i < inputs.length; i++) {
            if (inputs[i] === input) {
                errors[i].classList.add("displayNone");
            }
        }
    }
};

const change_image = () => {
    if (window.innerWidth < 986) {
        section.style.backgroundImage = "url(images/login_page_images/forgot/trees.jpg)";
    } else {
        section.style.backgroundImage = "url(images/login_page_images/forgot/forest1.jpg)";
    }
};

window.addEventListener("load", change_image);
window.addEventListener("resize", change_image);
