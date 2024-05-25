<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Restablecer la contraseña';

?>

<div class="container-reset d-flex justify-content-center align-items-center">
<div class="overlay"></div>

<div class="reset-password">
    <div class="row d-flex justify-content-center v-reset">
        <div class="col-12 sec-res">
            <h1><?= Html::encode($this->title) ?></h1>
            <p class="mb-3">
                Por favor, indícanos tu dirección de correo electrónico<br> y te enviaremos un enlace para que puedas volver a acceder a tu cuenta.
            </p>
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

            <?= $form->field($model, 'email')
                ->label('Dirección de correo electrónico')
                ->textInput(
                    [
                        'class' => 'form-style form-reset-i',
                        'placeholder' => 'Tu correo'    
                    ]
                    )
            ?>

            <div class="form-group">
                <?= Html::submitButton('Enviar enlace', ['class' => 'btn w-100 btn-reset-pass']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

</div>
