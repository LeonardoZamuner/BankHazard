<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BankHazard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../homepage/homepage.css">
</head>

<body>
  <header class="d-flex justify-content-between align-items-center">
    <div>
      <img src="../../LogoFinale2.png" alt="Logo" height="80">
    </div>
    <nav>
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link active" href="../homepage/homepage.php">Homepage</a>
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
          <a class="nav-link" href="../investimenti/investimenti.php">Investimenti</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../news_e_mercati/news_e_mercati.php">News e Mercati</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout/logout.php">Esci</a>
        </li>
      </ul>
    </nav>
  </header>

  <div class="container">
    <div id="saldo-container">
      <div>
        <h2>Saldo disponibile totale</h2>
        <p id="saldo-disponibile">0 €</p>
      </div>
      <div>
        <h2>Saldo contabile totale</h2>
        <p id="saldo-contabile">0 €</p>
      </div>
    </div>

    <div id="charts-container" class="d-flex justify-content-center">
      <div id="saldo-chart-container" class="chart-container">
        <canvas id="saldo-chart" width="200" height="200"></canvas>
      </div>
      <div id="line-chart-container" class="chart-container">
        <canvas id="line-chart" width="600" height="300"></canvas>
      </div>
    </div>
  </div>

  <!--Scripts-->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="homepage.js"></script>
</body>

</html>