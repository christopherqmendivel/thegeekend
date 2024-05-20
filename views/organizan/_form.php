<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Organizan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="organizan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ideventos')->textInput() ?>

    <?= $form->field($model, 'idtorneos')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
