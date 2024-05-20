<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RegistroUsuarios $model */

?>
<div class="container-principal crear-usuario w-100">
    <div class="container-create-user w-100">
        <div class="row s-1 justify-content-center align-items-center animate__animated animate__fadeIn">
            <div class="form-register">
                <h1 class="title">Registrar</h1>

                <?php $form = ActiveForm::begin(['options' => ['class' => 'form']]); ?>

                <?= $form->field($model, 'nombre')->textInput(['class' => 'form-control', 'placeholder' => 'Ingresa tu nombre'])->label(false) ?>

                <?= $form->field($model, 'nick')->textInput(['class' => 'form-control', 'placeholder' => 'Ingresa tu nombre de usuario'])->label(false) ?>

                <?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'placeholder' => 'correo@correo.com'])->label(false) ?>

                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Ingresa tu contraseña'])->label(false) ?>

                <?= $form->field($model, 'confirmarPassword')->passwordInput(['class' => 'form-control', 'placeholder' => 'Confirma tu contraseña'])->label(false) ?>

                <div class="form-group">
                    <?= Html::submitButton('Registrar', ['class' => 'btn btn-clean btn-principal rounded-pill']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
