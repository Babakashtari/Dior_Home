const category_selector = document.querySelector('main>section>div>fieldset>form>div.form-group>select[name="product_category"]');
const subcategory_container = document.querySelector("main>section>div>fieldset>form>div.form-group.sub");
const subcategory_selector = document.querySelector('main>section>div>fieldset>form>div.form-group>select[name="product_subcategory"]');
const inputs = document.querySelectorAll("main>section>div>fieldset>form>div.form-group");

const input_aligner = () => {
    if (subcategory_container.classList.contains("displayNone")) {
        for (let x = 0; x < 4; x++) {
            inputs[x].classList.add("col-12");
            inputs[x].classList.add("col-md-4");
            inputs[x].classList.remove("col-md-6");
        }
    } else {
        for (let x = 0; x < 4; x++) {
            inputs[x].classList.add("col-md-6");
            inputs[x].classList.remove("col-md-4");
        }
    }
};
input_aligner();

const subcategory_generator = main_category => {
    const categories = ["sleeping_products", "living_room_products", "carpet_products"];
    const values = [
        ["انتخاب کنید", "روبالشی", "روتختی", "ملافه", "کوسن"],
        ["انتخاب کنید", "پرده", "رومبلی", "کوسن", "رومیزی"],
        ["انتخاب کنید", "فرش", "روفرشی", "تابلوفرش"]
    ];
    const selected_category = main_category.value;
    if (selected_category) {
        subcategory_container.classList.remove("displayNone");
        input_aligner();
    } else {
        subcategory_container.classList.add("displayNone");
        input_aligner();
        const options = subcategory_selector.querySelectorAll("option");
        for (let i = 0; i < options.length; i++) {
            subcategory_selector.remove(options[i]);
        }
    }
    for (let i = 0; i < values.length; i++) {
        if (selected_category === categories[i]) {
            values[i].forEach(item => {
                const option = document.createElement("option");
                const textNode = document.createTextNode(item);
                option.appendChild(textNode);
                if (item === "انتخاب کنید") {
                    option.setAttribute("value", "");
                } else {
                    option.setAttribute("value", item);
                }
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
subcategory_generator(category_selector);
