<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);


$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/img/logo.ico')]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>

    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" type="image/png" href="<?= Yii::$app->request->baseUrl ?>/images/Logo/LogoTheGeekendFavicon.png" sizes="16x16">


    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
            ],
        ]);

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => Yii::$app->user->isGuest ? (
                // Menú para usuarios no registrados
                [
                    ['label' => 'Inicio', 'url' => ['/site/index']],
                    ['label' => 'Sobre Nosotros', 'url' => ['/site/about']],
                    ['label' => 'Contactar', 'url' => ['/site/contact']],
                    ['label' => 'Identificarse', 'url' => ['/site/login']],  // Enlace al formulario de login
                    ['label' => 'Registrarse', 'url' => ['/registro-usuarios/create']],
                ]
            ) : (
                // Menú para usuarios registrados
                [
                    ['label' => 'Torneos', 'url' => ['site/torneosadmin']],
                    ['label' => 'Participan', 'url' => ['site/jugadoresportorneo']],
                    [
                        'label' => 'Gestión',
                        'items' => [
                            ['label' => 'Actores', 'url' => ['/actores/index']],
                            ['label' => 'Asisten', 'url' => ['/asisten/index']],
                            ['label' => 'Bandas Sonoras', 'url' => ['/bandassonoras/index']],
                            ['label' => 'Coleccionables', 'url' => ['/coleccionables/index']],
                            ['label' => 'Escenarios Musicales', 'url' => ['/escenariosmusicales/index']],
                            ['label' => 'Eventos', 'url' => ['/eventos/index']],
                            ['label' => 'Jugadores', 'url' => ['/jugadores/index']],
                            ['label' => 'Organizan', 'url' => ['/organizan/index']],
                            ['label' => 'Participan', 'url' => ['/participan/index']],
                            ['label' => 'Teléfonos Actores', 'url' => ['/telefonosactores/index']],
                            ['label' => 'Torneos', 'url' => ['/torneos/index']],
                            ['label' => 'Venden', 'url' => ['/venden/index']],
                        ],
                    ],
                    '<li>'
                        . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>',
                ]
            ),
        ]);

        NavBar::end();
        ?>
    </header>




    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5><a href="https://www.instagram.com/slastra97/?hl=es" target="_blank">Privacidad</a></h5>
                </div>

                <div class="col-md-4">
                    <h5><?= Html::a('Sobre Nosotros', ['/site/about'], ['class' => 'profile-link']) ?></h5>
                </div>

                <div class="col-md-4">
                    <h5><a href="https://www.instagram.com/slastra97/?hl=es" target="_blank">Condiciones</a></h5>
                </div>

            </div>
            <hr>
            <div class="text-center">
                <!-- Redes Sociales -->
                <a href="https://www.instagram.com/slastra97/?hl=es" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="https://www.facebook.com/beliallsst.slastra97/" target="_blank" class="social-icon"><i class="fab fa-facebook"></i></a>
                <a href="https://www.youtube.com/@beliallsst516/videoss" target="_blank" class="social-icon"><i class="fab fa-youtube"></i></a>
                <a href="https://www.twitch.tv/beliallsst" target="_blank" class="social-icon"><i class="fab fa-twitch"></i></a>
            </div>
            <hr>
            <p class="float-left">&copy; The Geekend <?= date('Y') ?></p>
            <p class="float-right">Desarrollado por BelialLSST</p>
        </div>
    </footer>

    <!-- Integración de Bootstrap JS y jQuery -->
    <?= Html::jsFile('https://code.jquery.com/jquery-3.5.1.slim.min.js') ?>
    <?= Html::jsFile('https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js') ?>
    <?= Html::jsFile('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js') ?>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>