<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Coleccionables $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="coleccionables-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'material')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edicion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tomo')->textInput() ?>

    <?= $form->field($model, 'talla')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'medida')->textInput() ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
