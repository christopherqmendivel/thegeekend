<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Sobre Nosotros';
?>

<div class="site-about w-100">
    <h1 class="text-center" style="margin:3rem;"><?= Html::encode($this->title) ?></h1>

    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-md-5">
            <?= Html::img('@web/images/sobreNosotros/PrimeraNosotros.jpg', ['alt' => 'Empresa Fantasia', 'class' => 'about-image img-fluid', 'style' => 'max-height: 400px;']) ?>
        </div>
        <div class="col-md-5 d-flex align-items-center about-text">
            <p>
                Nuestro equipo está compuesto por fanáticos del anime y las películas frikis, lo que nos permite entender y capturar la esencia de estos universos en cada uno de nuestros eventos. Desde convenciones donde podrás codearte con tus personajes favoritos hasta proyecciones especiales que te transportarán a mundos llenos de aventuras y emociones, nos aseguramos de ofrecer experiencias inolvidables para todos nuestros visitantes.
            </p>
        </div>
    </div>

    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-md-5 order-md-2 d-flex justify-content-center">
            <?= Html::img('@web/images/sobreNosotros/SegundaNosotros.jpg', ['alt' => 'Empresa Fantasia', 'class' => 'second-image about-image img-fluid', 'style' => 'max-height: 400px;']) ?>
        </div>
        <div class="col-md-5 order-md-1 d-flex align-items-center about-text">
            <p>
                Sumérgete en nuestras convenciones, donde podrás conocer a tus héroes de anime en persona, participar en actividades temáticas y comprar merchandising exclusivo. En nuestras proyecciones especiales, te invitamos a vivir aventuras épicas y emocionantes junto a tus personajes favoritos en la pantalla grande.
            </p>
        </div>
    </div>
</div>
