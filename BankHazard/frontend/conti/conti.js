// JavaScript per aprire i link dei pulsanti in una nuova finestra
document.addEventListener("DOMContentLoaded", function () {
    var links = document.querySelectorAll(".nav-link");
    links.forEach(function (link) {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            var url = this.getAttribute("href");
            window.open(url, "_self");
        });
    });
});
