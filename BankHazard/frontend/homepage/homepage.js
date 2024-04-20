document.addEventListener('DOMContentLoaded', function () {
    // Funzione per mostrare/nascondere i saldi
    document.querySelectorAll('input[name="saldo-disponibile"]').forEach(function (radio) {
      radio.addEventListener('change', function () {
        document.getElementById('saldo-disponibile').style.display = this.value === 'mostra' ? 'block' : 'none';
      });
    });
  
    document.querySelectorAll('input[name="saldo-contabile"]').forEach(function (radio) {
      radio.addEventListener('change', function () {
        document.getElementById('saldo-contabile').style.display = this.value === 'mostra' ? 'block' : 'none';
      });
    });
  
    // Simulazione di dati dai database remoti
    const saldoDisponibile = 10000; // Esempio
    const saldoContabile = 15000; // Esempio
  
    // Inizializzazione del grafico Chart.js per i saldi
    const saldoChart = new Chart(document.getElementById('saldo-chart').getContext('2d'), {
      type: 'doughnut',
      data: {
        labels: ['Saldo Disponibile', 'Saldo Contabile'],
        datasets: [{
          label: 'Saldi Totali',
          data: [saldoDisponibile, saldoContabile],
          backgroundColor: ['#ff6384', '#36a2eb'],
        }],
      },
    });
  
    // Simulazione di dati per il grafico delle transazioni
    const transazioniData = {
      labels: ['Transazione 1', 'Transazione 2', 'Transazione 3', 'Transazione 4', 'Transazione 5', 'Transazione 6', 'Transazione 7', 'Transazione 8', 'Transazione 9', 'Transazione 10'],
      datasets: [{
        label: 'Andamento Transazioni',
        data: [500, -200, 1000, -300, 700, -400, 800, -600, 1200, -900],
        borderColor: '#ff6384',
        backgroundColor: 'transparent',
        borderWidth: 2,
      }],
    };
  
    // Inizializzazione del grafico Chart.js per le transazioni
    const transazioniChart = new Chart(document.getElementById('transazioni-chart').getContext('2d'), {
      type: 'line',
      data: transazioniData,
      options: {
        scales: {
          x: {
            title: {
              display: true,
              text: 'Giorni',
            },
          },
          y: {
            title: {
              display: true,
              text: '€ (Euro)',
            },
          },
        },
      },
    });
  
    // Funzione per aggiornare il grafico delle transazioni
    function updateTransazioniChart() {
      // Simulazione di nuovi dati dalle transazioni
      const newData = transazioniData.datasets[0].data.map(() => Math.floor(Math.random() * 2000 - 1000));
      transazioniChart.data.datasets[0].data = newData;
      transazioniChart.update();
    }
  
    // Aggiorna il grafico delle transazioni ogni 5 secondi (per scopi dimostrativi)
    setInterval(updateTransazioniChart, 5000);
  });  
  document.addEventListener('DOMContentLoaded', function () {
    // Simulazione di dati dai database remoti
    const saldoDisponibile = 10000; // Esempio
    const saldoContabile = 15000; // Esempio
  
    // Inizializzazione del grafico Chart.js per i saldi disponibili
    const saldoChart = new Chart(document.getElementById('saldo-chart').getContext('2d'), {
      type: 'doughnut',
      data: {
        labels: ['Disponibile', 'Utilizzato'],
        datasets: [{
          label: 'Saldo Disponibile',
          data: [saldoDisponibile, 0],
          backgroundColor: ['#36a2eb', '#222'], // Colore del cerchio e dello sfondo
        }],
      },
      options: {
        plugins: {
          legend: {
            display: false,
          },
        },
      },
    });
  
    // Inizializzazione del grafico Chart.js per i saldi contabili
    const saldoContabileChart = new Chart(document.getElementById('saldo-contabile-chart').getContext('2d'), {
      type: 'doughnut',
      data: {
        labels: ['Contabile', 'Utilizzato'],
        datasets: [{
          label: 'Saldo Contabile',
          data: [saldoContabile, 0],
          backgroundColor: ['#ff6384', '#222'], // Colore del cerchio e dello sfondo
        }],
      },
      options: {
        plugins: {
          legend: {
            display: false,
          },
        },
      },
    });
  
    // Aggiorna i valori dei saldi disponibili e contabili nel cerchio dinamico
    function updateSaldoValues() {
      document.getElementById('saldo-disponibile-value').innerText = saldoDisponibile.toLocaleString('it-IT') + ' €';
      document.getElementById('saldo-contabile-value').innerText = saldoContabile.toLocaleString('it-IT') + ' €';
  
      saldoChart.data.datasets[0].data = [saldoDisponibile, 0];
      saldoContabileChart.data.datasets[0].data = [saldoContabile, 0];
  
      saldoChart.update();
      saldoContabileChart.update();
    }
  
    // Chiamata alla funzione di aggiornamento dei saldi iniziale
    updateSaldoValues();
  });  