// JavaScript per aprire i link delle notizie in una nuova finestra
document.addEventListener("DOMContentLoaded", function () {
    var newsLinks = document.querySelectorAll(".news-item h2 a");
    newsLinks.forEach(function (link) {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            var url = this.getAttribute("href");
            window.open(url, "_blank");
        });
    });
});
