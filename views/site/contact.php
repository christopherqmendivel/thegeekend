<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Contacto';
?>

<div class="site-contact text-center">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Gracias por contactarnos. Te responderemos lo antes posible.
        </div>

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

                    <div class="form-group text-center">
                        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
