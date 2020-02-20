const form_container = document.querySelector("main > section.file-upload");
const category_selector = document.querySelector("main>section.file-upload>fieldset>form>div.form-group>select#category");
const category_error = document.querySelector("main>section.file-upload>fieldset>form>div.form-group>select#category+p");
const subcategory_selector = document.querySelector("main>section.file-upload>fieldset>form>div.form-group>select#subcategory");
const subcategory_container = document.querySelector("main>section.file-upload>fieldset>form>div.form-group.sub");
const preview_container = document.querySelector("main > section.file-upload > div.preview-container");
const preview_section = document.querySelector("main > section.file-upload > div.preview-container>div.preview");
const image_preview_section = document.querySelector("main>section.file-upload>div.preview-container>div.preview>img");
console.log(preview_container);
const inputs = document.querySelectorAll("main>section.file-upload>fieldset>form>div.form-group>input[type='text']");
const inputs_errors = document.querySelectorAll('main>section.file-upload>fieldset>form>div.form-group>input[type="text"]+p');

const selects = document.querySelectorAll("main>section.file-upload>fieldset>form>div.form-group>select");
const selects_errors = document.querySelectorAll("main>section.file-upload>fieldset>form>div.form-group>select+p");

const textarea_error = document.querySelector("main>section.file-upload>fieldset>form>div.form-group>textarea + p");
const fieldset = document.querySelector("main>section.file-upload>fieldset");

const subcategory_generator = main_category => {
  select_validate(/^(sleeping_products|living_room_products|carpet_products)$/, category_selector);
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
  if (!subcategory_container.classList.contains("displayNone")) {
    fieldset.style.height = "42rem";
    preview_container.style.height = "42rem";
  } else {
    fieldset.style.height = "38rem";
    preview_container.style.height = "38rem";
  }
};
const select_validate = (regex, select) => {
  for (let i = 0; i < selects.length; i++) {
    if (select === selects[i]) {
      if (select.value === "") {
        select.classList.remove("passed");
        select.classList.remove("failed");
        selects_errors[i].classList.add("displayNone");
      } else {
        if (regex.test(select.value)) {
          select.classList.add("passed");
          select.classList.remove("failed");
          selects_errors[i].classList.add("displayNone");
        } else {
          select.classList.add("failed");
          select.classList.remove("passed");
          selects_errors[i].classList.remove("displayNone");
        }
      }
    }
  }
};
const input_validate = (regex, input) => {
  for (let i = 0; i < inputs.length; i++) {
    if (input === inputs[i]) {
      if (input.value === "") {
        input.classList.remove("passed");
        input.classList.remove("failed");
        inputs_errors[i].classList.add("displayNone");
      } else {
        if (regex.test(input.value)) {
          input.classList.add("passed");
          input.classList.remove("failed");
          inputs_errors[i].classList.add("displayNone");
        } else {
          input.classList.add("failed");
          input.classList.remove("passed");
          inputs_errors[i].classList.remove("displayNone");
        }
      }
    }
  }
};
const textarea_validation = (regex, textarea) => {
  value = textarea.value;
  if (value === "") {
    textarea.classList.remove("passed");
    textarea.classList.remove("failed");
    textarea_error.classList.add("displayNone");
  } else {
    if (regex.test(value)) {
      textarea.classList.add("passed");
      textarea.classList.remove("failed");
      textarea_error.classList.add("displayNone");
    } else {
      textarea.classList.add("failed");
      textarea.classList.remove("passed");
      textarea_error.classList.remove("displayNone");
    }
  }
};
const resize = () => {
  if (window.innerWidth < 560) {
    form_container.classList.remove("container");
    form_container.classList.add("container-fluid");
  } else {
    form_container.classList.remove("container-fluid");
    form_container.classList.add("container");
  }
};
window.addEventListener("resize", resize);
window.addEventListener("load", resize);

// image preview:
const preview = event => {
  const src = URL.createObjectURL(event.target.files[0]);
  image_preview_section.setAttribute("src", src);
};
