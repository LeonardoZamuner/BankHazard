<!DOCTYPE html>
<html lang="it">

<head>
  <title>Obbligazioni</title>
  <link rel="stylesheet" href="obbligazioni.css">
  <script>
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
  </script>
</head>

<body>
  <header class="d-flex justify-content-between align-items-center py-4 px-5">
    <div>
      <img src="logo.png" alt="Logo" height="40">
    </div>
    <nav>
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="../../homepage/homepage.php">Homepage</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../conti/conti.php">Conti</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../carte/carte.php">Carte</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../pagamenti/pagamenti.php">Pagamenti</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../../investimenti/investimenti.php">Investimenti</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../news_e_mercati/news_e_mercati.php">News e Mercati</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../Log/logout.php">Esci</a>
        </li>
      </ul>
    </nav>
  </header>
  <main>
    <section>
      <h1>Esplora le Obbligazioni</h1>
      <div class="obbligazione">
        <h2 tabindex="0" role="button" aria-expanded="false">TESLA</h2>
        <div class="dettagli">
          <p>Prezzo corrente: 253.18</p>
          <p>Variazione percentuale: -31.4%</p>
        </div>
      </div>
      <div class="obbligazione">
        <h2 tabindex="0" role="button" aria-expanded="false">Amazon</h2>
        <div class="dettagli">
          <p>Prezzo corrente: 1538.35</p>
          <p>Variazione percentuale: +12.7%</p>
        </div>
      </div>
      <div class="obbligazione">
        <h2 tabindex="0" role="button" aria-expanded="false">Apple</h2>
        <div class="dettagli">
          <p>Prezzo corrente: 193.58</p>
          <p>Variazione percentuale: +0.22%</p>
        </div>
      </div>
      <div class="obbligazione">
        <h2 tabindex="0" role="button" aria-expanded="false">Microsoft</h2>
        <div class="dettagli">
          <p>Prezzo corrente: 246.23</p>
          <p>Variazione percentuale: -1.45%</p>
        </div>
      </div>
    </section>
    <section>
      <h1>Mover Giornalieri</h1>
      <div class="mover">
        <h2 tabindex="0" role="button" aria-expanded="false">EBIXQ Ethix Inc</h2>
        <div class="dettagli">
          <p>Variazione percentuale: 35.29%</p>
        </div>
      </div>
      <!-- Aggiungi altri mover qui -->
    </section>
  </main>
</body>

</html>