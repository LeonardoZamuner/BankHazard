// JavaScript per aprire i link dei pulsanti in una nuova finestra
document.addEventListener("DOMContentLoaded", function () {
    var buttons = document.querySelectorAll(".btn-danger");
    buttons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            var url = this.getAttribute("href");
            window.open(url, "_blank");
        });
    });
});
