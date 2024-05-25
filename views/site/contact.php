<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Contacto';
?>

<div class="site-contact w-100 h-100 text-center">
    <div class="overlay"></div>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')) : ?>

        <div class="alert alert-success">
            Gracias por contactarnos. Te responderemos lo antes posible.
        </div>

    <?php else : ?>



        <div class="row h-100 justify-content-center">
            <div class="col d-flex justify-content-center align-items-center animate__animated animate__fadeIn">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <h1><?= Html::encode($this->title) ?></h1>
                <p>
                    Si tienes consultas comerciales u otras preguntas, por favor completa el siguiente formulario para contactarnos.
                    Gracias.
                </p>
                <?= $form->field($model, 'name')->label('Nombre:')
                    ->textInput(
                        [
                            'class' => 'form-style',
                            'placeholder' => 'Tu nombre'
                        ]

                    )
                ?>

                <?= $form->field($model, 'email', ['options' => ['class' => '']])
                    ->label('Correo Electrónico:')
                    ->textInput(['class' => 'form-style', 'placeholder' => 'Tu correo electrónico'])
                ?>

                <?= $form->field($model, 'subject', ['options' => ['class' => '']])
                    ->label('Asunto:')
                    ->textInput(['class' => 'form-style', 'placeholder' => 'El asunto de tu mensaje'])
                ?>

                <?= $form->field($model, 'body', ['options' => ['class' => '']])
                    ->label('Mensaje:')
                    ->textarea(['rows' => 6, 'class' => 'form-style', 'placeholder' => 'Escribe tu mensaje aquí'])
                ?>


                <div class="form-group text-center">
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-contact btn-primary ', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>