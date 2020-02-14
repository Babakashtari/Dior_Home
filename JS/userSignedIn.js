const error_messages = document.querySelectorAll("main > section.form-container > div > fieldset > form > div.form-group > input + p");
const inputs = document.querySelectorAll("main>section.form-container>div>fieldset>form>div.form-group>input.form-input");
const personal_info_inputs = document.querySelectorAll("main>section.form-container>div>fieldset>form.personal-info>div.form-group>input");
const personal_info_gender_select = document.querySelector("main>section.form-container>div>fieldset>form.personal-info>div.form-group>select");
const contact_info_inputs = document.querySelectorAll("main>section.form-container>div>fieldset>form.contact-info>div.form-group>input");
const user_info_inputs = document.querySelectorAll("main>section.form-container>div>fieldset>form.user-info>div.form-group>input");
const validation_result = document.querySelector("main>section.validation-result");
const validation_result_div = document.querySelector("main>section.validation-result>div");

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

// showing validation result modal box:
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
const user_info_validator = event => {
    event.preventDefault();

    const submit_name = event.target.getAttribute("name");
    const parameters = [];
    const names = [];
    if (event.target.getAttribute("name") === "personal_info") {
        for (let i = 0; i < personal_info_inputs.length; i++) {
            const name = personal_info_inputs[i].getAttribute("name");
            names.push(name);
            const parameter = personal_info_inputs[i].value;
            parameters.push(parameter);
        }
        // adding selected element for gender to the parameters and names arrays as it is not an "input" element and accordingly not included in the previous inputs loop:
        const name = personal_info_gender_select.getAttribute("name");
        const parameter = personal_info_gender_select.value;
        names.push(name);
        parameters.push(parameter);
    } else if (event.target.getAttribute("name") === "contact_info") {
        for (let i = 0; i < contact_info_inputs.length; i++) {
            const name = contact_info_inputs[i].getAttribute("name");
            names.push(name);
            const parameter = contact_info_inputs[i].value;
            parameters.push(parameter);
        }
    } else if (event.target.getAttribute("name") === "user_info") {
        for (let i = 0; i < user_info_inputs.length; i++) {
            const name = user_info_inputs[i].getAttribute("name");
            names.push(name);
            const parameter = user_info_inputs[i].value;
            parameters.push(parameter);
        }
    }
    // console.log(names);
    // console.log(parameters);
    const AjaxLoader = (input_names, input_values, submit) => {
        let ajax_string = "";
        for (let i = 0; i < input_names.length; i++) {
            ajax_string += input_names[i] + "=" + input_values[i] + "&";
        }
        ajax_string += submit + "=" + submit;
        // console.log(ajax_string);
        const AJAX_request = new XMLHttpRequest();
        AJAX_request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // code to be executed when ajax receives an anwser...
                validation_result_div.innerHTML = this.responseText;
                validation_result.classList.remove("displayNone");
                close_spinners();
                close_modal();
            }
        };
        AJAX_request.open("POST", "php/user_modification.php", true);
        AJAX_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        AJAX_request.send(ajax_string);
    };
    AjaxLoader(names, parameters, submit_name);
};
