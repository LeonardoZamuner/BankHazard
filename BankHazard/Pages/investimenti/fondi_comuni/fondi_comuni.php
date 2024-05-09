<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fondi comuni</title>
    <link rel="stylesheet" href="fondi_comuni.css">
</head>
<body>
<header class="d-flex justify-content-between align-items-center py-4 px-5">
    <div>
      <img src="logo.png" alt="Logo" height="40">
    </div>
    <nav>
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="../homepage/homepage.php">Homepage</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../conti/conti.php">Conti</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../carte/carte.php">Carte</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pagamenti/pagamenti.php">Pagamenti</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../investimenti/investimenti.php">Investimenti</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../news_e_mercati/news_e_mercati.php">News e Mercati</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Log/logout.php">Esci</a>
        </li>
      </ul>
    </nav>
  </header>

<main>
    <section id="fondi-comuni">
        <h1>Esplora i Fondi Comuni di Investimento</h1>

        <div class="card-fondo">
            <h2>Fondo Azionario Globale</h2>
            <p>Gestito da Investimenti S.p.A.</p>
            <p>Rendimento annuo: 7%</p>
            <button type="button" onclick="investiOra('Fondo Azionario Globale')">Investi Ora</button>
        </div>

        <div class="card-fondo">
            <h2>Fondo Obbligazionario Europeo</h2>
            <p>Gestito da Banca Europa</p>
            <p>Rendimento annuo: 5.5%</p>
            <button type="button" onclick="investiOra('Fondo Obbligazionario Europeo')">Investi Ora</button>
        </div>

        <div class="card-fondo">
            <h2>Fondo Bilanciato Globale</h2>
            <p>Gestito da Investimenti Bilanciati Ltd.</p>
            <p>Rendimento annuo: 6.2%</p>
            <button type="button" onclick="investiOra('Fondo Bilanciato Globale')">Investi Ora</button>
        </div>

        <button type="button" onclick="visualizzaTutti()">Visualizza Tutti</button>
    </section>
</main>
<script src="fondi_comuni.js"></script>
</body>
</html>