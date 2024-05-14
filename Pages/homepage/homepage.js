// Codice JavaScript per il grafico del saldo
var saldoCtx = document.getElementById('saldo-chart').getContext('2d');
var saldoChart = new Chart(saldoCtx, {
  type: 'doughnut',
  data: {
    labels: ['Saldo disponibile', 'Saldo contabile'],
    datasets: [{
      label: '# of Votes',
      data: [9421093.16, 9601390.32], // Puoi aggiornare questi valori dinamicamente
      backgroundColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)'
      ],
      borderColor: [
        'rgba(255,255,255,.5)',
        'rgba(255,255,255,.5)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    responsive: false,
    plugins: {
      legend: {
        display: false // Nascondi la legenda se non necessario
      }
    }
  }
});

// Codice JavaScript per il grafico a linee
var lineCtx = document.getElementById('line-chart').getContext('2d');
var lineChart = new Chart(lineCtx, {
  type: 'line',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [{
      label: 'Line Chart',
      data: [65, 59, 80, 81, 56, 55, 40],
      borderColor: 'rgba(255, 206, 86, 1)',
      borderWidth: 2
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

