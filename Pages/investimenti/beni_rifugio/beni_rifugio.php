<!DOCTYPE html>
<html>

<head>
  <title>Beni rifugio</title>
  <link rel="stylesheet" type="text/css" href="beni_rifugio.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <header class="d-flex justify-content-between align-items-center py-4 px-5">
    <div>
      <img src="../../../LogoFinale2.png" alt="Logo" height="80">
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
    <section id="beni-rifugio">
      <h2>Esplora i Beni Rifugio</h2>
      <div class="card">
        <h2>Oro</h2>
        <p>Prezzo attuale: €1500 per oncia</p>
        <p>Variazione giornaliera: +0.22%</p>
      </div>
      <div class="card">
        <h2>Argento</h2>
        <p>Prezzo attuale: €20 per oncia</p>
        <p>Variazione giornaliera: -0.15%</p>
      </div>
      <div class="card">
        <h2>USDT</h2>
        <p>Prezzo attuale: €1</p>
        <p>Variazione giornaliera: 0.00%</p>
      </div>
    </section>
    <section>
      <h1>Mover Giornalieri</h1>
      <div class="movers">
        <div class="gain">
          <h2>Oro</h2>
          <p>+0.22%</p>
        </div>
        <div class="loss">
          <h2>Argento</h2>
          <p>-0.15%</p>
        </div>
      </div>
    </section>
  </main>
  <script src="beni_rifugio.js"></script>
</body>

</html>