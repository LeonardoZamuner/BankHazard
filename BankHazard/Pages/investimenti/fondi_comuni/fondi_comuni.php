<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investimenti in Fondi Comuni</title>
    <link rel="stylesheet" href="fondi_comuni/fondi_comuni.css">
</head>
<body>

<header>
    <nav>
        <ul id="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Fondi Comuni</a></li>
            <li><a href="#">ETF</a></li>
            <li><a href="#">Criptovalute</a></li>
            <li><a href="#">Profilo</a></li>
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

        <!-- Ripeti la struttura della card per altri fondi -->

        <button type="button" onclick="visualizzaTutti()">Visualizza Tutti</button>
    </section>
</main>

<footer>
    <p>© 2024 La tua banca</p>
</footer>

<script src="fondi_comuni.js"></script>
</body>
</html>
