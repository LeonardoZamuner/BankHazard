document.addEventListener('DOMContentLoaded', function () {
    var dettagli = document.querySelectorAll('.dettagli');
    dettagli.forEach(function (el) {
      el.style.display = 'none';
      el.previousElementSibling.setAttribute('aria-expanded', false);
      el.previousElementSibling.addEventListener('click', function () {
        var display = el.style.display === 'none' ? 'block' : 'none';
        el.style.display = display;
        this.setAttribute('aria-expanded', display === 'block');
      });
    });
  });