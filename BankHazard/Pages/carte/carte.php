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
                    <a class="nav-link active" href="homepage.html">Homepage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="conti.php">Conti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carte.php">Carte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pagamenti.php">Pagamenti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="investimenti.php">Investimenti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="news_e_mercati.php">News e Mercati</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Esci</a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>Le Tue Carte di Credito</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">ID Carta</th>
                    <th scope="col">IBAN</th>
                    <th scope="col">Scadenza</th>
                    <th scope="col">Numero Carta</th>
                    <th scope="col">Saldo Disponibile</th>
                    <th scope="col">Saldo Contabile</th>
                    <th scope="col">CVV</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Intestatario</th>
                    <th scope="col">Conto Correlato</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connessione al database
                $servername = "localhost";
                $username = "root";
                $password = ""; // Password del database
                $dbname = "bankhazarddb";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }

                // Query per recuperare le carte di credito dell'utente
                $sql = "SELECT ID_Carta, IBAN, Scadenza, NumeroCarta, SaldoDisponibile, SaldoContabile, CVV, Tipologia, Intestatario, ContoCorrelato FROM Carte";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output dei dati in una tabella HTML
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["ID_Carta"] . "</td><td>" . $row["IBAN"] . "</td><td>" . $row["Scadenza"] . "</td><td>" . $row["NumeroCarta"] . "</td><td>" . $row["SaldoDisponibile"] . "</td><td>" . $row["SaldoContabile"] . "</td><td>" . $row["CVV"] . "</td><td>" . $row["Tipologia"] . "</td><td>" . $row["Intestatario"] . "</td><td>" . $row["ContoCorrelato"] . "</td></tr>";
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