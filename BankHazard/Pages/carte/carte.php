<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte di Credito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../carte/carte.css">
</head>

<body>
    <header class="d-flex justify-content-between align-items-center">
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
                    <a class="nav-link active" href="../carte/carte.php">Carte</a>
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
                    <a class="nav-link" href="../Log/logout.php">Esci</a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>Le Tue Carte di Credito</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">IBAN</th>
                    <th scope="col">Scadenza</th>
                    <th scope="col">Numero Carta</th>
                    <th scope="col">Saldo Disponibile</th>
                    <th scope="col">Saldo Contabile</th>
                    <th scope="col">CVV</th>
                    <th scope="col">Tipologia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once("..\BaseFunction\BankFunction.php");
                include_once("..\BaseFunction\BaseFunction.php");
                BaseFunction::DBconnection();
                BaseFunction::CreateSession();
                $sql = "SELECT ID_utente FROM utenti WHERE email=".$_SESSION["email"].";";
                $result = $conn->query($sql);
                $idUtente = $result->fetch_assoc()["ID_utente"];
                // Query per recuperare le carte di credito dell'utente
                $sql = "SELECT * FROM Carte WHERE $idUtente";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output dei dati in una tabella HTML
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["IBAN"] . "</td><td>" . $row["Scadenza"] . "</td><td>" . $row["NumeroCarta"] . "</td><td>" . $row["SaldoDisponibile"] . "</td><td>" . $row["SaldoContabile"] . "</td><td>" . $row["CVV"] . "</td><td>" . $row["Tipologia"] . "</td><td>";
                    }
                } else {
                    echo "Nessuna carta trovata";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>