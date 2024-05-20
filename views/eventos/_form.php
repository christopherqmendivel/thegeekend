<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Eventos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="eventos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lugar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'finicio')->textInput() ?>

    <?= $form->field($model, 'ffinal')->textInput() ?>

    <?= $form->field($model, 'idbs')->textInput() ?>

    <?= $form->field($model, 'idesmu')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
