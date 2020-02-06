const first_section = document.querySelector("main>section:first-of-type>div");
const paragraphs = document.querySelectorAll("main>section:first-of-type>div>p");
const sigining_section = document.querySelector("main>section.signing");
const legends = document.querySelectorAll("main > section.signing > div > fieldset > legend");
const inputs = document.querySelectorAll("main > section.signing > div > fieldset > form > div > input");
const error_messages = document.querySelectorAll("main > section.signing > div > fieldset > form > div > p");
const signin_inputs = document.querySelectorAll("main>section.signing>div>fieldset.signin>form>div>input");
const signup_inputs = document.querySelectorAll("main>section.signing>div>fieldset.signup>form>div>input");
const signin_submit_button = document.querySelector(
    'main>section.signing>div>fieldset.signin>form>input[type="submit"]'
);
const signup_submit_button = document.querySelector(
    'main>section.signing>div>fieldset.signup>form>input[type="submit"]'
);
const resizer = () => {
    if (window.innerWidth < 1200) {
        first_section.classList.add("container-fluid");
        first_section.classList.remove("container");
        sigining_section.classList.add("container-fluid");
        sigining_section.classList.remove("container");
    } else {
        first_section.classList.remove("container-fluid");
        first_section.classList.add("container");
        sigining_section.classList.remove("container-fluid");
        sigining_section.classList.add("container");
    }
    if (window.innerWidth < 1040) {
        for (let i = 0; i < paragraphs.length; i++) {
            paragraphs[i].classList.add("text-justify");
            paragraphs[i].classList.remove("text-center");
        }
    } else {
        for (let i = 0; i < paragraphs.length; i++) {
            paragraphs[i].classList.remove("text-justify");
            paragraphs[i].classList.add("text-center");
        }
    }
    if (window.innerWidth < 800) {
        for (let i = 0; i < legends.length; i++) {
            legends[i].style.fontSize = "1rem";
        }
    } else {
        for (let i = 0; i < legends.length; i++) {
            legends[i].style.fontSize = "1.5rem";
        }
    }
};
window.addEventListener("load", resizer);
window.addEventListener("resize", resizer);

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
    const validated_signup_inputs = document.querySelectorAll(
        "main>section.signing>div>fieldset.signup>form>div>input.passed"
    );
    const validated_signin_inputs = document.querySelectorAll(
        "main>section.signing>div>fieldset.signin>form>div>input.passed"
    );
    if (signin_inputs.length === validated_signin_inputs.length) {
        signin_submit_button.removeAttribute("disabled");
    } else {
        signin_submit_button.disabled = true;
    }
    if (signup_inputs.length === validated_signup_inputs.length) {
        signup_submit_button.removeAttribute("disabled");
    } else {
        signup_submit_button.disabled = true;
    }
};
