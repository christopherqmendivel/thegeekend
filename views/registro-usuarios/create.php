<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;

/** @var yii\web\View $this */
/** @var app\models\RegistroUsuarios $model */

AppAsset::register($this);

?>
<div class="container-principal crear-usuario w-100 h-100">
    <div class="container-create-user w-100 h-100">
        <div class="overlay"></div>
        <div class="row h-100 s-1 justify-content-center align-items-center animate__animated animate__fadeIn">
            <div class="col-8">
                <div class="form-register">
                    <h1 class="title">Registrar</h1>

                    <?php $form = ActiveForm::begin(['options' => ['class form-group' => 'form']]); ?>

                    <?= $form->field($model, 'nombre')->textInput(['class' => 'form-control form-style', 'placeholder' => 'Tu nombre'])->label(false) ?>

                    <?= $form->field($model, 'nick')->textInput(['class' => 'form-control form-style', 'placeholder' => 'Tu nombre de usuario'])->label(false) ?>

                    <?= $form->field($model, 'email')->textInput(['class' => 'form-control form-style', 'placeholder' => 'Tu correo'])->label(false) ?>

                    <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-style', 'placeholder' => 'Tu contraseña'])->label(false) ?>

                    <?= $form->field($model, 'confirmarPassword')->passwordInput(['class' => 'form-control form-style', 'placeholder' => 'Confirma tu contraseña'])->label(false) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Registrar', ['class' => 'btn btn-clean btn-principal w-100']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>