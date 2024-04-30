<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ricarica Telefonica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../ricarica_telefonica/ricarica_telefonica.css">
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
        <h1>Ricarica Telefonica</h1>
        <form>
            <div class="mb-3">
                <label for="numeroTelefono" class="form-label">Numero di Telefono</label>
                <input type="text" class="form-control" id="numeroTelefono" placeholder="Inserisci il numero di telefono">
            </div>
            <div class="mb-3">
                <label for="importoRicarica" class="form-label">Importo Ricarica</label>
                <input type="text" class="form-control" id="importoRicarica" placeholder="Inserisci l'importo della ricarica">
            </div>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">Ricarica</button>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="color: #000;">
                    <h5 class="modal-title" id="confirmModalLabel">Conferma Ricarica</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <p style="color: #000;">Sei sicuro di voler procedere con la ricarica telefonica?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-danger">Conferma</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="ricarica_telefonica.js"></script>
</body>

</html>

