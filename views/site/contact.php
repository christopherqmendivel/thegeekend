<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = 'Contacto';
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
<div class="site-contact text-center">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Gracias por contactarnos. Te responderemos lo antes posible.
        </div>

        <p>
            Ten en cuenta que si activas el depurador de Yii, deberías poder
            ver el mensaje de correo en el panel de correo del depurador.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Como la aplicación está en modo de desarrollo, el correo no se envía sino que se guarda como
                un archivo en <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Por favor, configura la propiedad <code>useFileTransport</code> del componente de aplicación <code>mail</code>
                en false para habilitar el envío de correo electrónico.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            Si tienes consultas comerciales u otras preguntas, por favor completa el siguiente formulario para contactarnos.
            Gracias.
        </p>

        <div class="row justify-content-center">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->label('Nombre:')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email')->label('Correo Electrónico:') ?>

                    <?= $form->field($model, 'subject')->label('Asunto:') ?>

                    <?= $form->field($model, 'body')->label('Mensaje:')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->label('Código de Verificación')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3 text-center">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group text-center">
                        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
    <!-- Enlace a Bootstrap JS y Popper.js (requeridos por Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</body>
</html>
