<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conti Bancari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../conti/conti.css">
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
                    <a class="nav-link active" href="../conti/conti.php">Conti</a>
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
                    <a class="nav-link" href="../Log/logout.php">Esci</a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>I Tuoi Conti Bancari</h1>
        <table class="table table-dark table-striped">
            <th
                <tr>
                    <th scope="col">ID Conto</th>
                    <th scope="col">IBAN</th>
                    <th scope="col">Saldo Corrente</th>
                    <th scope="col">Saldo Contabile</th>
                    <th scope="col">Intestatario</th>
                </tr>
            </th>
            <tb>
                <?php
                include_once("..\BaseFunction\BankFunction.php");
                include_once("..\BaseFunction\BaseFunction.php");
                BaseFunction::DBconnection();
                BaseFunction::CreateSession();
                $sql = "SELECT ID_utente FROM utenti WHERE email=".$_SESSION["email"].";";
                $result = $conn->query($sql);
                $idUtente = $result->fetch_assoc()["ID_utente"];
                // Query per recuperare i conti correnti dell'utente
                $sql = "SELECT * FROM ContiCorrente WHERE Intestatario = $idUtente";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output dei dati in una tabella HTML
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["ID_conto"] . "</td><td>" . $row["IBAN"] . "</td><td>" . $row["SaldoCorrente"] . "</td><td>" . $row["SaldoContabile"] . "</td><td>" . $row["Intestatario"] . "</td></tr>";
                    }
                } else {
                    echo "Nessun conto trovato";
                }
                $conn->close();
                ?>
            </tb>
        </table>
    </div>

</body>

</html>