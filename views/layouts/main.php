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
                            'Logout (' . Yii::$app->user->identity->nick . ')',
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

    <footer id="footer" class="footer">
        <div class="container mt-0">
            <div class="row row-1 mb-4">
                <div class="col d-flex justify-content-center">
                    <span class="title">correo@correo</span>
                </div>
            </div>

            <div class="row row-2 contain-redes">
                <div class="col d-flex justify-content-center">
                    <?= Html::a('Gitlab', 'https://www.facebook.com', ['class' => 'social-link', 'target' => '_blank']) ?>
                    <?= Html::a('Github', 'https://www.twitter.com', ['class' => 'social-link mx-3', 'target' => '_blank']) ?>
                    <?= Html::a('LinkedIn', 'https://www.instagram.com', ['class' => 'social-link', 'target' => '_blank']) ?>
                </div>
            </div>

            <div class="row row-3 contain-redes">
                <div class="col d-flex justify-content-center">
                    <span class="gotogether">Thegeekend</span>
                </div>
            </div>

            <div class="row row-4 contain-redes">
                <div class="col d-flex justify-content-center">
                    <span class="copyright">© 2024 Thegeekend / Diseño por Sergio</span>
                </div>
            </div>

            <div class="footer-right-image"></div>
        </div>
        </div>
    </footer>


    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>