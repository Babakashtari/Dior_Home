const spinner = document.querySelector('div.spinner-border');
const result = document.querySelector('div.result');

setTimeout(() => {
    spinner.classList.add('displayNone');
    result.classList.remove('displayNone');
}, 2000);