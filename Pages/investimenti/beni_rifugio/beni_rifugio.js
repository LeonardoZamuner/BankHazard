$(document).ready(function() {
    // Funzione per creare una card
    function creaCard(nome, prezzo, variazione) {
        return '<div class="card"><h3>' + nome + '</h3><p>Prezzo attuale: ' + prezzo + '</p><p>Variazione giornaliera: ' + variazione + '%</p></div>';
    }

    // Carica i dati dei beni rifugio
    $.getJSON('beniRifugio.json', function(data) {
        $.each(data, function(key, val) {
            $('#beni-rifugio-cards').append(creaCard(val.nome, val.prezzo, val.variazione));
        });
    });

    // Carica i dati dei movers
    $.getJSON('movers.json', function(data) {
        $.each(data, function(key, val) {
            $('#movers-cards').append(creaCard(val.nome, val.prezzo, val.variazione));
        });
    });

    // Aggiungi funzionalità di interazione al menu
    $('#menu li a').on('click', function(e) {
        e.preventDefault();
        var categoria = $(this).text();
        $('.card').hide();
        $('.card:contains("' + categoria + '")').show();
    });

    // Aggiungi funzionalità di hover alle card
    $('.card').hover(function() {
        $(this).addClass('hover');
    }, function() {
        $(this).removeClass('hover');
    });
});
