<!DOCTYPE html>
<html lang="it">
<head>
    <title>Home Banking - Investimenti in Obbligazioni</title>
    <link rel="stylesheet" href="../obbligazioni/obbligazioni.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dettagli = document.querySelectorAll('.dettagli');
            dettagli.forEach(function(el) {
                el.style.display = 'none';
                el.previousElementSibling.setAttribute('aria-expanded', false);
                el.previousElementSibling.addEventListener('click', function() {
                    var display = el.style.display === 'none' ? 'block' : 'none';
                    el.style.display = display;
                    this.setAttribute('aria-expanded', display === 'block');
                });
            });
        });
    </script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Obbligazioni</a></li>
                <li><a href="#">Criptovalute</a></li>
                <li><a href="#">ETF</a></li>
                <li><a href="#">CopyTrader</a></li>
                <li><a href="#">Smart Portfolio</a></li>
                <li><a href="#">NFT</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h1>Esplora le Obbligazioni</h1>
            <div class="obbligazione">
                <h2 tabindex="0" role="button" aria-expanded="false">TESLA</h2>
                <div class="dettagli">
                    <p>Prezzo corrente: 253.18</p>
                    <p>Variazione percentuale: -31.4%</p>
                </div>
            </div>
            <div class="obbligazione">
                <h2 tabindex="0" role="button" aria-expanded="false">Amazon</h2>
                <div class="dettagli">
                    <p>Prezzo corrente: 1538.35</p>
                    <p>Variazione percentuale: +12.7%</p>
                </div>
            </div>
            <div class="obbligazione">
                <h2 tabindex="0" role="button" aria-expanded="false">Apple</h2>
                <div class="dettagli">
                    <p>Prezzo corrente: 193.58</p>
                    <p>Variazione percentuale: +0.22%</p>
                </div>
            </div>
            <div class="obbligazione">
                <h2 tabindex="0" role="button" aria-expanded="false">Microsoft</h2>
                <div class="dettagli">
                    <p>Prezzo corrente: 246.23</p>
                    <p>Variazione percentuale: -1.45%</p>
                </div>
            </div>
        </section>
        <section>
            <h1>Mover Giornalieri</h1>
            <div class="mover">
                <h2 tabindex="0" role="button" aria-expanded="false">EBIXQ Ethix Inc</h2>
                <div class="dettagli">
                    <p>Variazione percentuale: 35.29%</p>
                </div>
            </div>
            <!-- Aggiungi altri mover qui -->
        </section>
    </main>
</body>
</html>
