// Simulazione dati dei conti
const conti = [
    { numeroConto: '0123456789', saldoDisponibile: 5000, saldoContabile: 5500, valuta: 'EUR' },
    { numeroConto: '9876543210', saldoDisponibile: 3000, saldoContabile: 3200, valuta: 'USD' },
    // Aggiungi altri conti se necessario
  ];
  
  document.addEventListener('DOMContentLoaded', () => {
    const tbody = document.querySelector('tbody');
  
    conti.forEach(conto => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${conto.numeroConto}</td>
        <td>${conto.saldoDisponibile} ${conto.valuta}</td>
        <td>${conto.saldoContabile} ${conto.valuta}</td>
        <td>${conto.valuta}</td>
      `;
      tbody.appendChild(row);
    });
  })