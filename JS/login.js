const first_section = document.querySelector("main>section.welcome>div");
const paragraphs = document.querySelectorAll("main>section.welcome>div>p");
const sigining_section = document.querySelector("main>section.signing");
const legends = document.querySelectorAll("main > section.signing > div > fieldset > legend");
const inputs = document.querySelectorAll("main > section.signing > div > fieldset > form > div > input");
const error_messages = document.querySelectorAll("main > section.signing > div > fieldset > form > div > p");
const signin_inputs = document.querySelectorAll("main>section.signing>div>fieldset.signin>form>div>input");
const signup_inputs = document.querySelectorAll("main>section.signing>div>fieldset.signup>form>div>input");
const signin_submit_button = document.querySelector('main>section.signing>div>fieldset.signin>form>input[type="submit"]');
const signup_submit_button = document.querySelector('main>section.signing>div>fieldset.signup>form>input[type="submit"]');
const validation_result = document.querySelector("main>section.validation-result");
const spinners = document.querySelectorAll("main > section.validation-result > div > div.spinner-grow");
const validation_result_div = document.querySelector("main>section.validation-result>div");
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
    const validated_signup_inputs = document.querySelectorAll("main>section.signing>div>fieldset.signup>form>div>input.passed");
    const validated_signin_inputs = document.querySelectorAll("main>section.signing>div>fieldset.signin>form>div>input.passed");
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
// ajax call for form validation result:
const close_validation_result = () => {
    for (let i = 0; i < spinners.length; i++) {
        spinners[i].classList.remove("displayNone");
    }
    validation_result.classList.add("displayNone");
};
window.addEventListener("click", event => {
    if (event.target !== validation_result_div && !validation_result.classList.contains("displayNone")) {
        close_validation_result();
    }
});
const open_validation_result = () => {
    console.log(spinners);
    for (let i = 0; i < spinners.length; i++) {
        setTimeout(() => {
            spinners[i].classList.add("displayNone");
        }, 1000);
    }
};
const signing_validation = event => {
    event.preventDefault();

    if (event.target.classList.contains("login")) {
        for (let i = 0; i < 4; i++) {
            inputs[i].value = null;
        }
    } else if (event.target.classList.contains("signup")) {
        for (let i = 4; i < inputs.length; i++) {
            inputs[i].value = null;
        }
    }
    const parameters = [inputs[0].value, inputs[1].value, inputs[2].value, inputs[3].value, inputs[4].value, inputs[5].value];
    const AjaxLoader = (signup_username, signup_password, signup_email, signup_phone, login_username, login_password) => {
        const AJAX_request = new XMLHttpRequest();
        AJAX_request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // code to be executed... (ex: removing the display:none of the modal validation box)
                validation_result.innerHTML = this.responseText;
                validation_result.classList.remove("displayNone");
                console.log(spinners);
            }
        };
        AJAX_request.open("POST", "loginResult.php", true);
        AJAX_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // prettier-ignore
        AJAX_request.send("signup_username=" + signup_username + "&signup_password=" + signup_password + "&signup_email="+ signup_email + "&signup_phone="+ signup_phone + "&login_username="+ login_username + "&login_password="+ login_password);
    };
    AjaxLoader(...parameters);
};
