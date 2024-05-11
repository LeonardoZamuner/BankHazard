// Codice JavaScript per la pagina Bonifico
document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita il comportamento predefinito del form
    $('#confirmModal').modal('show'); // Mostra la finestra modale al momento del submit del form
});
