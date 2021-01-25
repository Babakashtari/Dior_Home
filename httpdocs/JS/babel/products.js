"use strict";

var category_selector = document.querySelector('main>section>div>fieldset>form>div.form-group>select[name="product_category"]');
var subcategory_container = document.querySelector("main>section>div>fieldset>form>div.form-group.sub");
var subcategory_selector = document.querySelector('main>section>div>fieldset>form>div.form-group>select[name="product_subcategory"]');
var inputs = document.querySelectorAll("main>section>div>fieldset>form>div.form-group");

var input_aligner = function input_aligner() {
    if (subcategory_container.classList.contains("displayNone")) {
        for (var x = 0; x < 4; x++) {
            inputs[x].classList.add("col-12");
            inputs[x].classList.add("col-md-4");
            inputs[x].classList.remove("col-md-6");
        }
    } else {
        for (var _x = 0; _x < 4; _x++) {
            inputs[_x].classList.add("col-md-6");

            inputs[_x].classList.remove("col-md-4");
        }
    }
};

input_aligner();

var subcategory_generator = function subcategory_generator(main_category) {
    var categories = ["sleeping_products", "living_room_products", "carpet_products"];
    var values = [
        ["انتخاب کنید", "روبالشی", "روتختی", "ملافه", "کوسن"],
        ["انتخاب کنید", "پرده", "رومبلی", "کوسن", "رومیزی"],
        ["انتخاب کنید", "فرش", "روفرشی", "تابلوفرش"]
    ];
    var selected_category = main_category.value;

    if (selected_category) {
        subcategory_container.classList.remove("displayNone");
        input_aligner();
    } else {
        subcategory_container.classList.add("displayNone");
        input_aligner();
        var options = subcategory_selector.querySelectorAll("option");

        for (var i = 0; i < options.length; i++) {
            subcategory_selector.remove(options[i]);
        }
    }

    var _loop = function _loop(_i) {
        if (selected_category === categories[_i]) {
            values[_i].forEach(function (item) {
                var option = document.createElement("option");
                var textNode = document.createTextNode(item);
                option.appendChild(textNode);

                if (item === "انتخاب کنید") {
                    option.setAttribute("value", "");
                } else {
                    option.setAttribute("value", item);
                }

                option.classList.add(categories[_i]);
                subcategory_selector.appendChild(option);
            });
        } else {
            var _options = subcategory_selector.querySelectorAll("option");

            for (var s = 0; s < _options.length; s++) {
                if (_options[s].classList.contains(categories[_i])) {
                    subcategory_selector.remove(_options[s]);
                }
            }
        }
    };

    for (var _i = 0; _i < values.length; _i++) {
        _loop(_i);
    }
};

subcategory_generator(category_selector);