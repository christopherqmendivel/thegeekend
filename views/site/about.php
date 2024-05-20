<?php

/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Sobre Nosotros';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Friki</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <!-- Agrega enlaces a tus archivos CSS y JavaScript aquí -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?= Url::to('@web/css/site.css') ?>">

    <!-- Enlace a Lightbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

</head>
<body>
    <style>
        .site-about {
            margin-left: 50px; /* Margen izquierdo */
            margin-right: 50px; /* Margen derecho */
            margin-bottom: 50px;
        }
        .about-image {
            width: 400px;
            height: 400px;
            object-fit: cover;
            margin-right: 0; /* Elimina el margen derecho de la segunda imagen */
        }
        .site-about h1 {
            text-align: center; /* Centra el título */
            margin-bottom: 20px ; /* Espacio entre el título y el contenido */
            margin-top: 50px;
        }
        .about-text {
            font-size: 20px; /* Tamaño de fuente más grande */
        }
    </style>

    <div class="site-about">
        <h1><?= Html::encode($this->title) ?></h1>

        <div class="row mt-4">
            <div class="col-md-6">
                <?= Html::img('@web/images/sobreNosotros/PrimeraNosotros.jpg', ['alt' => 'Empresa Fantasia', 'class' => 'about-image']) ?>
            </div>
            <div class="col-md-6 align-self-center about-text">
                <p>
                    Nuestro equipo está compuesto por fanáticos del anime y las películas frikis, lo que nos permite entender y capturar la esencia de estos universos en cada uno de nuestros eventos. Desde convenciones donde podrás codearte con tus personajes favoritos hasta proyecciones especiales que te transportarán a mundos llenos de aventuras y emociones, nos aseguramos de ofrecer experiencias inolvidables para todos nuestros visitantes.
                </p>
            </div>
        </div>

        <div class="row mt-4"> <!-- Añadido margen superior -->
            <div class="col-md-6 order-md-2">
                <?= Html::img('@web/images/sobreNosotros/SegundaNosotros.jpg', ['alt' => 'Empresa Fantasia', 'class' => 'second-image about-image']) ?>
            </div>
            <div class="col-md-6 order-md-1 align-self-center about-text">
                <p>
                    Sumérgete en nuestras convenciones, donde podrás conocer a tus héroes de anime en persona, participar en actividades temáticas y comprar merchandising exclusivo. En nuestras proyecciones especiales, te invitamos a vivir aventuras épicas y emocionantes junto a tus personajes favoritos en la pantalla grande.
                </p>
            </div>
        </div>
    </div>
<!-- Enlace a Bootstrap JS y Popper.js (requeridos por Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    
</body>
</html>
