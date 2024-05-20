<?php

use yii\helpers\Html;
use app\models\Torneos; // Asegúrate de ajustar el namespace y la ubicación del modelo Torneo según tu estructura de directorios

$this->title = 'Torneos por Modalidad';
$this->params['breadcrumbs'][] = $this->title;

// Consulta para obtener la cantidad de torneos por modalidad
$torneosPorModalidad = Torneos::find()
    ->select(['modalidad', 'COUNT(*) AS total'])
    ->groupBy(['modalidad'])
    ->orderBy(['total' => SORT_DESC])
    ->asArray()
    ->all();

// Convertir los resultados en un formato compatible con Chart.js
$modalidades = [];
$torneos = [];
foreach ($torneosPorModalidad as $data) {
    $modalidades[] = $data['modalidad'];
    $torneos[] = (int) $data['total'];
}

// Configuración del gráfico
$chartData = [
    'type' => 'bar',
    'data' => [
        'labels' => $modalidades,
        'datasets' => [
            [
                'label' => 'Cantidad de Torneos',
                'backgroundColor' => 'rgba(0, 0, 0, 0.7)',
                'borderColor' => 'rgba(146, 210, 67, 1)',
                'borderWidth' => 3,
                'data' => $torneos,
            ],
        ],
    ],
    'options' => [
        'scales' => [
            'yAxes' => [[
                'ticks' => [
                    'beginAtZero' => true,
                ],
            ]],
        ],
        'plugins' => [
            'datalabels' => [
                'color' => 'red' // Cambia este color según sea necesario
            ]
        ]
    ],
];

// Convertir la configuración a JSON
$chartDataJSON = json_encode($chartData, JSON_UNESCAPED_UNICODE);

// Registro del script para inicializar el gráfico
$this->registerJs("var ctx = document.getElementById('torneosPorModalidadChart').getContext('2d'); new Chart(ctx, $chartDataJSON);");

// Consulta para obtener los juegos agrupados por modalidad
$juegosPorModalidad = Torneos::find()
    ->select(['modalidad', 'juego'])
    ->orderBy(['modalidad' => SORT_ASC, 'juego' => SORT_ASC])
    ->asArray()
    ->all();

// Agrupar los juegos por modalidad
$modalidadesJuegos = [];
foreach ($juegosPorModalidad as $data) {
    $modalidadesJuegos[$data['modalidad']][] = $data['juego'];
}
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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?= Html::encode($this->title) ?></h1>
            <canvas id="torneosPorModalidadChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>
<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4" style="margin-right: 100px">
                <h2 class="text-center mb-4">Listado de Juegos por Modalidad Grafico</h2>
                <?php 
                    $modalidadesLabels = [];
                    $juegosData = [];
                    foreach ($modalidadesJuegos as $modalidad => $juegos) {
                        $modalidadesLabels[] = $modalidad;
                        $juegosData[] = count($juegos);
                    }
                ?>
                <canvas id="juegosPorModalidadChart" width="400" height="200"></canvas>
            </div>
            <div class="col-md-7" style="margin-left: auto;">
                <h2 class="text-center mb-4">Listado de Juegos por Modalidad</h2>
                <div class="row">
                    <?php foreach ($modalidadesJuegos as $modalidad => $juegos): ?>
                        <div class="col-md-4 mb-4">
                            <h3><?= $modalidad ?></h3>
                            <ul class="list-unstyled">
                                <?php foreach ($juegos as $juego): ?>
                                    <li><?= $juego ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>
    <style>
    #torneosPorModalidadChart {
        margin-bottom: 50px; /* Ajusta este valor según sea necesario */
    }
    
    /* Cambiar el color del texto de las etiquetas */
    #torneosPorModalidadChart .chartjs-render-monitor .chartjs-plugin-datalabels text {
        fill: red; /* Cambia este color según sea necesario */
    }
    
    #juegosPorModalidadChart {
        margin-bottom: 50px; /* Ajusta este valor según sea necesario */
    }
    
    .grafico-container {
        margin-right: 100px;
    }

    .lista-container {
        margin-left: auto;
    }
    
    </style>
<!-- Enlace a Bootstrap JS y Popper.js (requeridos por Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    
    
    <script>
// Configuración y datos para el gráfico de juegos por modalidad
var juegosPorModalidadData = {
    labels: <?= json_encode($modalidadesLabels) ?>,
    datasets: [{
        data: <?= json_encode($juegosData) ?>,
        backgroundColor: [
            'rgba(255, 99, 132, 0.7)',
            'rgba(54, 162, 235, 0.7)',
            'rgba(255, 206, 86, 0.7)',
            'rgba(75, 192, 192, 0.7)',
            'rgba(153, 102, 255, 0.7)',
            'rgba(255, 159, 64, 0.7)'
        ]
    }]
};

// Obtener el contexto del lienzo para el gráfico de juegos por modalidad
var juegosPorModalidadCtx = document.getElementById('juegosPorModalidadChart').getContext('2d');

// Crear el gráfico de juegos por modalidad
var juegosPorModalidadChart = new Chart(juegosPorModalidadCtx, {
    type: 'pie',
    data: juegosPorModalidadData,
    options: {
        plugins: {
            datalabels: {
                color: 'white',
                font: {
                    weight: 'bold'
                }
            }
        }
    }
});
</script>
</body>
</html>
