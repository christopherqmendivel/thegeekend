<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Restablecer la contraseña';

?>

<div class="reset-password">
    <div class="row d-flex justify-content-center v-reset">
        <div class="col-12 sec-res">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>
                Por favor, indícanos tu dirección de correo electrónico<br> y te enviaremos un enlace para que puedas volver a acceder a tu cuenta.
            </p>
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

            <?= $form->field($model, 'email')
                ->label('Dirección de correo electrónico')
                ->textInput(['autofocus' => true])
            ?>

            <div class="form-group">
                <?= Html::submitButton('Enviar enlace', ['class' => 'btn btn-primary w-100 rounded-pill']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

