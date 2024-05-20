<?php

use yii\helpers\Html;
use app\models\Torneos;

$this->title = 'Participaciones por Torneo';
$this->params['breadcrumbs'][] = $this->title;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <!-- Agrega enlaces a tus archivos CSS y JavaScript aquí -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> 
    <!-- CAMBIAR -->

    <!-- Enlace a Lightbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="participan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <canvas id="myChart" width="200" height="200"></canvas>

</div>

<?php
// Convertir los datos PHP a un formato que pueda ser utilizado por Chart.js
$data = [];
$labels = [];
foreach ($participaciones as $participacion) {
    // Obtener el nombre del torneo basado en su ID y agregarlo a las etiquetas
    $torneo = Torneos::findOne($participacion['idtorneos']);
    if ($torneo) {
        $labels[] = $torneo->juego;
    } else {
        $labels[] = "Torneo Desconocido";
    }
    $data[] = $participacion['cantidad'];
}

// Convertir los datos PHP a formato JSON para ser utilizados por Chart.js
$dataJson = json_encode($data);
$labelsJson = json_encode($labels);
?>

<!-- Script para inicializar el gráfico con Chart.js -->
<script>
    // Registro de código JavaScript para inicializar el gráfico con Chart.js
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= $labelsJson ?>,
            datasets: [{
                label: 'Cantidad de Participantes por Torneo',
                data: <?= $dataJson ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
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
</script>
<div style="display: flex; justify-content: center;">
        <div style="margin-right: 20px;">
            <canvas id="barChart" width="400" height="300"></canvas>
        </div>
        <div>
            <canvas id="bubbleChart" width="400" height="300"></canvas>
        </div>
    </div>

    <script>
        // Datos para el gráfico de barras
        var ctxBar = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Valorant', 'Fornite', 'TFT'],
                datasets: [{
                    label: 'Cantidad de Participantes',
                    data: [20, 30, 15],
                    backgroundColor: ['rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)', 'rgba(255, 206, 86, 0.7)'],
                    borderColor: ['rgba(146, 210, 67, 1)', 'rgba(146, 210, 67, 1)', 'rgba(146, 210, 67, 1)'],
                    borderWidth: 3
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

        
</script>
<!-- Enlace a Bootstrap JS y Popper.js (requeridos por Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</body>
</html>