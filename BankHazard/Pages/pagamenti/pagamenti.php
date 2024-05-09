<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagamenti</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../pagamenti/pagamenti.css">
</head>

<body style="background-color: #222; color: #fff;">
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
          <a class="nav-link active" href="../pagamenti/pagamenti.php">Pagamenti</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../investimenti/investimenti.php">Investimenti</a>
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

  <div class="container">
    <h1>Effettua un Pagamento</h1>
    <div class="row">
      <div class="col">
      <a href="bonifico/bonifico.php" class="btn btn-danger btn-lg btn-block">Bonifico</a>
      </div>
      <div class="col">
      <a href="bollo_auto/bollo_auto.php" class="btn btn-danger btn-lg btn-block">Pagamento Bollo Auto</a>
      </div>
      <div class="col">
      <a href="ricarica_telefonica/ricarica_telefonica.php" class="btn btn-danger btn-lg btn-block">Ricarica Telefonica</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>