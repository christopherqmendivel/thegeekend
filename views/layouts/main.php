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
                'class' => 'navbar navbar-expand-md h-100',
            ],
        ]);

        // Menú principal
        $menuItems = [];
        if (Yii::$app->user->isGuest) {
            // Menú para usuarios no registrados
            $menuItems = [
                ['label' => 'Inicio', 'url' => ['/site/index']],
                ['label' => 'Sobre Nosotros', 'url' => ['/site/about']],
                ['label' => 'Contactar', 'url' => ['/site/contact']],
                ['label' => 'Eventos', 'url' => ['/eventos/index']], /* Si lo quieres cuando el usuario esté logeado, bórralo de aquí */

            ];
        } else {
            // Menú para usuarios registrados
            if (Yii::$app->user->identity->roles === 'admin') {
                $menuItems = [
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
                ];
            } else {
                $menuItems = [
                    ['label' => 'Inicio', 'url' => ['/site/index']],
                    ['label' => 'Sobre Nosotros', 'url' => ['/site/about']],
                    ['label' => 'Contactar', 'url' => ['/site/contact']],
                    ['label' => 'Eventos', 'url' => ['/eventos/index']],
                ];
            }
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav mr-auto'], 
            'items' => $menuItems,
        ]);

        // Contenedor para los elementos de login y registro
        echo '<div class="navbar-nav ml-auto">'; 

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => Yii::$app->user->isGuest ? (
                // Menú para usuarios no registrados
                [
                    ['label' => '<i class="fas fa-sign-in-alt"></i> Identificarse', 'url' => ['/site/login'], 'encode' => false, 'options' => ['class' => 'nav-item']],
                    ['label' => 'Registrarse', 'url' => ['/registro-usuarios/create'], 'options' => ['class' => 'nav-item']],
                ]
            ) : (
                // Menú para usuarios registrados
                [
                    '<li class="nav-item">'
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

        echo '</div>'; 

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

    <footer id="footer" class="footer w-100">
        <div class="container mt-0">
            <div class="row row-footer">
                <div class="col-3 d-flex align-items-center">
                    <h3 class="title m-0">the geekend</h3>
                </div>
                <div class="col-6">
                    <span>
                        The Modern Art Gallery is free to all visitors and open seven days a week from 8am to 9pm. Find us at 99 King Street, Newport, USA.
                    </span>
                </div>
                <div class="col-3">
                    <div class="social">

                        <?php
                        echo Html::a(
                            '<i class="fa-brands fa-twitter"></i>',
                            ['site/twitter'],
                            ['class' => 'twitter icon-social', 'aria-label' => 'twitter']
                        );

                        echo Html::a(
                            '<i class="fa-brands fa-linkedin-in"></i>',
                            ['site/linkedin'],
                            ['class' => 'linkedin icon-social', 'aria-label' => 'LinkedIn']
                        );

                        echo Html::a(
                            '<i class="fa-brands fa-gitlab"></i>',
                            ['site/gitlab'],
                            ['class' => 'gitlab icon-social', 'aria-label' => 'GitLab']
                        );
                        ?>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>


    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>