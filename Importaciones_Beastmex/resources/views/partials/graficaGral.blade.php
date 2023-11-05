<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdb@5.5.0/dist/css/mdb.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <canvas id="myChart"></canvas>
      </div>
      <div class="col-md-6 mt-4">
        <table class="table table-bordered table table-hover text-center">
          <thead>
            <tr>
              <th>Producto</th>
              <th>Cantidad Vendida</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Producto 1</td>
              <td>--</td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    var data = {
      labels: ["Enero", "Febrero", "Marzo", "Abril"],
      datasets: [
        {
          label: "Compras",
          data: [150, 200, 180, 250], 
          borderColor: "rgba(255, 99, 132, 1)",
          borderWidth: 1
        },
        {
          label: "Ventas",
          data: [300, 350, 320, 400], 
          borderColor: "rgba(75, 192, 192, 1)",
          borderWidth: 1
        }
      ]
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
            var datasetLabel = data.datasets[tooltipItem.datasetIndex].label;
            var value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return datasetLabel + ': $' + value.toFixed(2);
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
