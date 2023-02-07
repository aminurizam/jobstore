import './bootstrap';

window.addEventListener("beforeunload", function(event) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "/tasks/reset", true);
    xhr.send();
});
