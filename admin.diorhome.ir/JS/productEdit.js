"use strict";var inputs=document.querySelectorAll("input[type=text]"),input_errors=document.querySelectorAll("input+p"),selects=document.querySelectorAll("select"),select_errors=document.querySelectorAll("select+p"),subcategory_selector=document.querySelector("select#product_subcategory");console.log(subcategory_selector);var input_validate=function input_validate(regex,input){for(var i=0;i<inputs.length;i++){var validation_result;if(input===inputs[i])if(""===input.value)input.classList.remove("passed"),input.classList.remove("failed"),input_errors[i].classList.add("displayNone");else regex.test(input.value)?(input.classList.add("passed"),input.classList.remove("failed"),input_errors[i].classList.add("displayNone")):(input.classList.add("failed"),input.classList.remove("passed"),input_errors[i].classList.remove("displayNone"))}},select_validate=function select_validate(regex,select){for(var i=0;i<selects.length;i++)select===selects[i]&&(""===select.value?(select.classList.remove("passed"),select.classList.remove("failed"),select_errors[i].classList.add("displayNone")):regex.test(select.value)?(select.classList.add("passed"),select.classList.remove("failed"),select_errors[i].classList.add("displayNone")):(select.classList.add("failed"),select.classList.remove("passed"),select_errors[i].classList.remove("displayNone")))},create_subcategory=function create_subcategory(event){select_validate(/^(sleeping_products|living_room_products|carpet_products)$/,event.target);for(var categories=["sleeping_products","living_room_products","carpet_products"],values=[["روبالشی","روتختی","ملافه","کوسن"],["پرده","رومبلی","کوسن","رومیزی"],["فرش","روفرشی","تابلوفرش"]],_loop=function _loop(i){if(event.target.value===categories[i])values[i].forEach((function(item){var option=document.createElement("option"),textNode=document.createTextNode(item);option.appendChild(textNode),option.setAttribute("value",item),option.classList.add(categories[i]),subcategory_selector.appendChild(option)}));else for(var options=subcategory_selector.querySelectorAll("option"),s=0;s<options.length;s++)options[s].classList.contains(categories[i])&&subcategory_selector.remove(options[s])},i=0;i<values.length;i++)_loop(i)};