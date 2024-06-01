<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Restablecer la Contraseña';
?>
<div class="confirmar-password-reset-password">
    <div class="row recover-password">
        <div class="col">
            <h1><?= Html::encode($this->title) ?></h1>

            <?php if (Yii::$app->session->hasFlash('error')) : ?>
                <div class="alert alert-danger">
                    <?= Yii::$app->session->getFlash('error') ?>
                </div>
            <?php endif; ?>

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'new_password')->passwordInput() ?>

            <div class="regex">
                <span><b>La contraseña debe contener al menos:</b></span>
                <ul class="list">
                    <li class="">8 caracteres</li>
                    <li>1 letra en mayúscula</li>
                    <li>1 número o carácter especial (por ejemplo, "#", "?", "!" o "&")</li>

                </ul>
            </div>

            <?= $form->field($model, 'confirm_password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Cambiar contraseña', ['class' => 'btn btn-primary rounded-pill w-100 p-3']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>