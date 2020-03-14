const error = document.querySelector("body > section.background-image > fieldset > form > div.form-group > p");
const section = document.querySelector("body > section.background-image");

const validate = (regex, input) => {
    const value = input.value;
    // if the input value is not empty:
    if (value !== "") {
        // when the inserted input value is valid:
        if (regex.test(value)) {
            input.style.border = "3px solid green";
            error.classList.add("displayNone");
            // when the inserted input value is not valid:
        } else {
            input.style.border = "3px solid red";
            error.classList.remove("displayNone");
        }
        // if the input value is empty:
    } else {
        input.style.border = "3px solid transparent";
        error.classList.add("displayNone");
    }
};
