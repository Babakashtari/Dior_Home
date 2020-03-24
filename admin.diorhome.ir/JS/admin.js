const error_messages = document.querySelectorAll("main>section>form>div.form-group>p");
const inputs = document.querySelectorAll("main>section>form>div.form-group>input");
const submit_button = document.querySelector('main>section>form>input[type="submit"]');

const validate = (regex, input) => {
    for (let i = 0; i < error_messages.length; i++) {
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
    const validated_inputs = document.querySelectorAll("main>section>form>div.form-group>input.passed");
    if (inputs.length === validated_inputs.length) {
        submit_button.removeAttribute("disabled");
    } else {
        submit_button.disabled = true;
    }
};
