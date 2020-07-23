const inputs = document.querySelectorAll('input[type=text]');
const input_errors = document.querySelectorAll('input+p');
const selects = document.querySelectorAll('select');
const select_errors = document.querySelectorAll('select+p');
const subcategory_selector = document.querySelector('select#product_subcategory');

console.log(subcategory_selector);

const input_validate = (regex, input) => {
    for (let i = 0; i < inputs.length; i++) {
        if (input === inputs[i]) {
            if (input.value === "") {
                input.classList.remove("passed");
                input.classList.remove("failed");
                input_errors[i].classList.add("displayNone");
            } else {
                const validation_result = regex.test(input.value);
                if (validation_result) {
                    input.classList.add("passed");
                    input.classList.remove("failed");
                    input_errors[i].classList.add("displayNone");
                } else {
                    input.classList.add("failed");
                    input.classList.remove("passed");
                    input_errors[i].classList.remove("displayNone");
                }
            }
        }
    }
};

const select_validate = (regex, select) => {
    for (let i = 0; i < selects.length; i++) {
        if (select === selects[i]) {
            if (select.value === "") {
                select.classList.remove("passed");
                select.classList.remove("failed");
                select_errors[i].classList.add("displayNone");
            } else {
                if (regex.test(select.value)) {
                    select.classList.add("passed");
                    select.classList.remove("failed");
                    select_errors[i].classList.add("displayNone");
                } else {
                    select.classList.add("failed");
                    select.classList.remove("passed");
                    select_errors[i].classList.remove("displayNone");
                }
            }
        }
    }
};

const create_subcategory = (event) => {
    select_validate(/^(sleeping_products|living_room_products|carpet_products)$/, event.target);
    const categories = [
        "sleeping_products",
        "living_room_products",
        "carpet_products"
    ];
    const values = [
        ["روبالشی", "روتختی", "ملافه", "کوسن"],
        ["پرده", "رومبلی", "کوسن", "رومیزی"],
        ["فرش", "روفرشی", "تابلوفرش"]
    ];

    for (let i = 0; i < values.length; i++) {
        if (event.target.value === categories[i]) {
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

}