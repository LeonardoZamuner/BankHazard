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
        <h1>I Tuoi Conti Bancari</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">ID Conto</th>
                    <th scope="col">IBAN</th>
                    <th scope="col">Saldo Corrente</th>
                    <th scope="col">Saldo Contabile</th>
                    <th scope="col">Intestatario</th>
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

                // Query per recuperare i conti correnti dell'utente
                $sql = "SELECT ID_conto, IBAN, SaldoCorrente, SaldoContabile, Intestatario FROM ContiCorrente";
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
            </tbody>
        </table>
    </div>

</body>

</html>