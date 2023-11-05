<!DOCTYPE html>
<html>
<head>
  <title>Gráfico con Tooltips Formateados</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdb@5.5.0/dist/css/mdb.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>
</head>
<body>
  <div class="container w-50">
    <canvas id="myChart"></canvas>
  </div>

  <script>
    // Datos solo para el mes de Enero
    var data = {
      labels: ["Semana 1", "Semana 2", "Semana 3", "Semana 4"],
      datasets: [{
        label: "Ventas en Enero",
        data: [120, 150, 100, 200],
        borderColor: "rgba(75, 192, 192, 1)",
        borderWidth: 1
      }]
    };

    var options = {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      },
      tooltips: {
        callbacks: {
          label: function(tooltipItem, data) {
            var value = data.datasets[0].data[tooltipItem.index];
            return 'Venta: $' + value.toFixed(2);
          }
        }
      }
    };

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: options
    });
  </script>
</body>
</html>
