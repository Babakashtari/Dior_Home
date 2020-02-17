const category_selector = document.querySelector("main>section.file-upload>fieldset>form>div.form-group>select#category");
const subcategory_selector = document.querySelector("main>section.file-upload>fieldset>form>div.form-group>select#subcategory");
const subcategory_container = document.querySelector("main>section.file-upload>fieldset>form>div.form-group.sub");
const error_messages = document.querySelectorAll("main > section.file-upload > fieldset > form > div.form-group > p");
const inputs = document.querySelectorAll("main>section.file-upload>fieldset>form>div.form-group>input[type='text']");
const selects = document.querySelectorAll("main>section.file-upload>fieldset>form>div.form-group>select");

const form_elements = [inputs[0], inputs[1], selects[0], selects[1]];
console.log(inputs);

const subcategory_generator = main_category => {
    validate(/^(فرش|کالای اتاق پذیرایی|کالای خواب)$/, this);
    const categories = ["sleeping_products", "living_room_products", "carpet_products"];
    const values = [
        ["روبالشی", "روتختی", "ملافه", "کوسن"],
        ["پرده", "رومبلی", "کوسن", "رومیزی"],
        ["فرش", "روفرشی", "تابلوفرش"]
    ];
    const selected_category = main_category.value;
    if (selected_category) {
        subcategory_container.classList.remove("displayNone");
    } else {
        subcategory_container.classList.add("displayNone");
    }
    for (let i = 0; i < categories.length; i++) {
        if (selected_category === categories[i]) {
            values[i].forEach(item => {
                const option = document.createElement("option");
                const textNode = document.createTextNode(item);
                option.appendChild(textNode);
                option.setAttribute("value", item);
                option.classList.add(categories[i]);
                subcategory_selector.appendChild(option);
            });
        } else {
            const options = subcategory_selector.querySelectorAll("option");
            for (let s = 0; s < options.length; s++) {
                if (options[s].classList.contains(categories[i])) {
                    subcategory_selector.remove(options[s]);
                }
            }
        }
    }
};

const validate = (regex, input) => {
    for (let i = 0; i < error_messages.length; i++) {
        if (input === form_elements[i]) {
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
    // const validated_elements = document.querySelectorAll('main>section.file-upload>fieldset>form>div.form-group>select')
};
