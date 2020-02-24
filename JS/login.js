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

const close_spinners = () => {
    const container_of_spinners = document.querySelector("main > section.validation-result > div > div");
    const paragraph_results = document.querySelectorAll("main>section.validation-result>div>p");

    setTimeout(() => {
        container_of_spinners.classList.add("displayNone");
        for (let i = 0; i < paragraph_results.length; i++) {
            paragraph_results[i].classList.remove("displayNone");
        }
    }, 1000);
};
const close_modal = () => {
    const container = document.querySelector("main>section.validation-result");
    const modal = document.querySelector("main>section.validation-result>div");

    if (!container.classList.contains("displayNone")) {
        window.addEventListener("click", event => {
            if (event.target !== modal) {
                container.classList.add("displayNone");
            }
        });
    }
};
// self invoking function for page reload for making logout text turn into green in the jumbotron:
// (() => {
//     setTimeout(() => {
//         location.replace("login.php");
//     }, 1000);
// })();
const change_url = () => {
    location.replace("login.php");
};
// ajax call for form validation result:
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
    const AjaxLoader = (signup_username, signup_password, signup_email, signup_mobile_phone, login_username, login_password) => {
        const AJAX_request = new XMLHttpRequest();
        AJAX_request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // code to be executed when ajax receives an anwser...
                validation_result_div.innerHTML = this.responseText;
                validation_result.classList.remove("displayNone");
                close_spinners();
                close_modal();
                const validation_result_message = document.querySelector("main>section.validation-result>div>p.signing-message");
                if (validation_result_message.classList.contains("successful")) {
                    setTimeout(() => {
                        change_url();
                    }, 1000);
                }
            }
        };
        AJAX_request.open("POST", "php/loginResult.php", true);
        AJAX_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // prettier-ignore
        AJAX_request.send("signup_username=" + signup_username + "&signup_password=" + signup_password + "&signup_email="+ signup_email + "&signup_mobile_phone="+ signup_mobile_phone + "&login_username="+ login_username + "&login_password="+ login_password);
    };
    AjaxLoader(...parameters);
};
