/********** MESSAGES **********/

setTimeout(function () {
    let messageElement = document.querySelector('.message');
    if (messageElement) {
        messageElement.classList.add('fadeOut');
    }
}, 5000);


setTimeout(function () {
    let messageElement = document.querySelector('.message');
    if (messageElement) {
        messageElement.remove();
    }
}, 6000);
