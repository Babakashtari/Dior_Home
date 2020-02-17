const category_selector = document.querySelector("main>section.file-upload>fieldset>form>div.form-group>select#category");
const subcategory_selector = document.querySelector("main>section.file-upload>fieldset>form>div.form-group>select#subcategory");
const subcategory_container = document.querySelector("main>section.file-upload>fieldset>form>div.form-group.sub");

console.log(subcategory_container);

const subcategory_generator = main_category => {
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
