const spinner = document.getElementsByClassName('spinner-border')[0];
const tick = document.getElementsByClassName('tick')[0];
const delete_message = document.getElementsByClassName('delete-message')[0];

const tick_animation = () => {
    setTimeout(() => {
        spinner.classList.add('displayNone');
        tick.classList.remove('displayNone');
        delete_message.classList.remove('displayNone');
    }, 1000);
}

tick_animation();