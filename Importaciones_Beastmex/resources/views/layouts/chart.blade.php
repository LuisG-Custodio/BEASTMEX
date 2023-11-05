<script>
    $(document).ready(function() {
        // Inicializa el gráfico con valores predeterminados
        var chartData = {
            // Coloca tus datos de gráfico aquí
        };

        var chart = new mdb.Chart('chart-container', {
            type: 'line',
            data: chartData,
            options: {
                // Configura las opciones del gráfico
            }
        });

        // Maneja el cambio en el menú desplegable
        $('#select-month').on('change', function() {
            var selectedMonth = $(this).val();
            // Realiza una solicitud AJAX para obtener los datos del gráfico para el mes seleccionado
            // Luego, actualiza el gráfico con los nuevos datos
            $.ajax({
                url: '/api/get-chart-data', // Define una ruta que devuelve los datos del gráfico
                method: 'GET',
                data: { month: selectedMonth },
                success: function(data) {
                    chart.setData(data);
                }
            });
        });
    });
</script>
