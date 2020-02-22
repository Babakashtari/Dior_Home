const subcategory_container = document.querySelector("main>section>div>fieldset>form>div.form-group.sub");
const subcategory_selector = document.querySelector('main>section>div>fieldset>form>div.form-group>select[name="subcategory"]');
const inputs = document.querySelectorAll("main>section>div>fieldset>form>div.form-group");
console.log(inputs);

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
    input_aligner();
  } else {
    subcategory_container.classList.add("displayNone");
    input_aligner();
  }
  for (let i = 0; i < values.length; i++) {
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
