<?php
/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'The Geekend';

$imagePath = Yii::getAlias('@webroot/images/eventos/');
$images = scandir($imagePath);
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

    <!-- Carrusel con Bootstrap -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <?= Html::img('@web/images/slider/Slider1.jpg', ['alt' => 'Evento Santander 21', 'class' => 'd-block w-100']) ?>
            </div>
            <div class="carousel-item">
                <?= Html::img('@web/images/Slider/Slider2.png', ['alt' => 'Evento Bilbao 21', 'class' => 'd-block w-100']) ?>
            </div>
            <div class="carousel-item">
                <?= Html::img('@web/images/slider/Slider3.jpg', ['alt' => 'Evento Bilbao 22', 'class' => 'd-block w-100']) ?>
            </div>
            <div class="carousel-item">
                <?= Html::img('@web/images/slider/Slider4.jpg', ['alt' => 'Evento Barcelona 23', 'class' => 'd-block w-100']) ?>
            </div>
            <div class="carousel-item">
                <?= Html::img('@web/images/slider/Slider5.jpg', ['alt' => 'Evento Santander 22', 'class' => 'd-block w-100']) ?>
            </div>
            <!-- Agrega más items del carrusel aquí -->
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

    <!-- Presentación -->
    <div class="presentation">
        <h2>Bienvenido a tu Mundo Friki</h2>
        <p>Ingresa a tu propio reino friki y explora un universo repleto de eventos inolvidables. Nos dedicamos con pasión a brindarte experiencias únicas y divertidas.</p>
        <p>¿A qué esperas? Únete a nuestro próximo evento y no te arrepentirás.</p>
        <p>Eso sí, buscamos a personas atrevidas; deja la vergüenza en casa y siéntete libre.</p>
    </div>
    <!-- Título de Portafolio -->
    <div class="portafolio">
        <h2 class="text-center mt-4">Portafolios:</h2> 
    </div>
    
    <!-- Galería -->
    <div class="galeria-container">
        <div class="row galeria">
            <?php foreach (array_diff($images, ['.', '..']) as $image): ?>
                <?php $imageUrl = Url::to('@web/images/eventos/' . $image); ?>
                <div class="col-md-3 mb-4">
                    <a href="javascript:void(0);" class="img-thumbnail" onclick="openModal('<?= $imageUrl ?>')">
                        <img src="<?= $imageUrl ?>" alt="Thumbnail" class="img-fluid">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <!-- Modal para mostrar la imagen en grande -->
    <div class="modal fade" id="lightboxModal" tabindex="-1" role="dialog" aria-labelledby="lightboxModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img class="img-fluid" id="lightboxImage">
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(imageUrl) {
            console.log("Clic en miniatura");
            console.log("URL de imagen: " + imageUrl);

            // Verificar si el modal existe
            var modal = document.getElementById("lightboxModal");
            if (modal) {
                console.log("El modal existe");
            } else {
                console.error("Error: No se encontró el modal");
                return;
            }

            // Verificar si el elemento #lightboxImage existe
            var lightboxImage = document.getElementById("lightboxImage");
            if (lightboxImage) {
                console.log("El elemento #lightboxImage existe");
            } else {
                console.error("Error: No se encontró el elemento #lightboxImage");
                return;
            }

            // Cambiar la fuente de la imagen
            try {
                lightboxImage.src = imageUrl;
                console.log("Se cambió la fuente de la imagen");
            } catch (error) {
                console.error("Error al cambiar la fuente de la imagen: " + error.message);
            }

            // Mostrar el modal
            try {
                $(modal).modal("show");
                console.log("Se mostró el modal");
            } catch (error) {
                console.error("Error al mostrar el modal: " + error.message);
            }
        }
    </script>

    
    <!-- Sección con fondo diferente -->
    <div class="fondo-seccion">
        <!-- Título de Últimas Reseñas -->
        <div class="reseñas">
            <h2 class="text-center mt-4">Últimas Reseñas:</h2> 
        </div>
        <!-- Tarjetas y fondo -->
        <div class="card-container" >
            <!-- Tarjeta 1 -->
            <div class="card">
                <?= Html::img('@web/images/personas/persona1.jpg', ['alt' => 'Persona 1', 'class' => 'card-img-top']) ?>
                <div class="card-body">
                    <h3>Susana Sanchez</h3>
                    <div class="rating" id="ratingStars1">
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                    </div>
                    <p>¡Increíble experiencia! Disfruté cada momento.</p>
                    <p><b>10/10</b></p>
                </div>
            </div>

            <!-- Tarjeta 2 -->
            <div class="card">
                <?= Html::img('@web/images/personas/persona2.jpg', ['alt' => 'Persona 2', 'class' => 'card-img-top']) ?>
                <div class="card-body">
                    <h3>Gustavo Fernandez</h3>
                    <div class="rating" id="ratingStars2">
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span></span>
                        <span></span>
                    </div>
                    <p>Buen evento en The Geekend. Actividades interesantes, pero con margen de mejora. En general, experiencia decente.</p>
                    <p><b>6/10</b></p>
                </div>
            </div>
            <!-- Tarjeta 3 -->
            <div class="card">
                <?= Html::img('@web/images/personas/persona3.jpg', ['alt' => 'Persona 3', 'class' => 'card-img-top']) ?>
                <div class="card-body">
                    <h3>Enrique Hernandez</h3>
                    <div class="rating" id="ratingStars2">
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span></span>
                    </div>
                    <p>Fantástico tiempo en The Geekend. Bien organizado, comida deliciosa. ¡Superó expectativas! Definitivamente volveré.</p>
                    <p><b>8/10</b></p>
                </div>
            </div>
            <!-- Tarjeta 4 -->
            <div class="card">
                <?= Html::img('@web/images/personas/persona4.jpg', ['alt' => 'Persona 3', 'class' => 'card-img-top']) ?>
                <div class="card-body">
                    <h3>Teo Frio</h3>
                    <div class="rating" id="ratingStars2">
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                        <span>★</span>
                    </div>
                    <p>¡Increíble evento friki! La atmósfera llena de energía geek, con cosplays asombrosos y actividades que hicieron latir el corazón de cualquier fanático. ¡Ya estoy esperando la próxima edición!</p>
                    <p><b>10/10</b></p>
                </div>
            </div>
            <!--Mas tarjetas -->
        </div>
    </div>

    <!-- Enlace a Bootstrap JS y Popper.js (requeridos por Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    
</body>
</html>



