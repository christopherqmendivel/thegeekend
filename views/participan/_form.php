<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Participan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="participan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idtorneos')->textInput() ?>

    <?= $form->field($model, 'idjugadores')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
