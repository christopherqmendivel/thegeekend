<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Torneos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="torneos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'juego')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modojuego')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modalidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechahora')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
