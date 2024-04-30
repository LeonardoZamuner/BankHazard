<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento Bollo Auto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../bollo_auto/bollo_auto.css">
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
        <h1>Pagamento Bollo Auto</h1>
        <form action="process_payment.php" method="POST">
            <div class="mb-3">
                <label for="importo" class="form-label">Importo</label>
                <input type="text" class="form-control" id="importo" name="importo" required>
            </div>
            <div class="mb-3">
                <label for="iban" class="form-label">IBAN</label>
                <input type="text" class="form-control" id="iban" name="iban" required>
            </div>
            <div class="mb-3">
                <label for="data_scadenza" class="form-label">Data di scadenza</label>
                <input type="date" class="form-control" id="data_scadenza" name="data_scadenza" required>
            </div>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">Paga Bollo Auto</button>
        </form>
    </div>

    <!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="color: #000;">
                <h5 class="modal-title" id="confirmModalLabel">Conferma Pagamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p style="color: #000;">Sei sicuro di voler procedere con il pagamento del bollo auto?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-danger">Conferma</button>
            </div>
        </div>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

