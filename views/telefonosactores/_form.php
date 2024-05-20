<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Telefonosactores $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="telefonosactores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idactores')->textInput() ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
