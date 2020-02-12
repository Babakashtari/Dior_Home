const error_messages = document.querySelectorAll("main > section.form-container > div > fieldset > form > div.form-group > input + p");
const inputs = document.querySelectorAll("main>section.form-container>div>fieldset>form>div.form-group>input.form-input");
console.log(inputs);
const form_validator = (regex, input) => {
    for (let i = 0; i < inputs.length; i++) {
        if (input === inputs[i]) {
            if (input.value === "") {
                input.classList.remove("passed");
                input.classList.remove("failed");
                error_messages[i].classList.add("displayNone");
            } else {
                const validation_result = regex.test(input.value);
                if (validation_result) {
                    input.classList.add("passed");
                    input.classList.remove("failed");
                    error_messages[i].classList.add("displayNone");
                } else {
                    input.classList.add("failed");
                    input.classList.remove("passed");
                    error_messages[i].classList.remove("displayNone");
                }
            }
        }
    }
};
// window.addEventListener('load', form_validator);
