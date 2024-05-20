<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Asisten $model */

$this->title = 'Update Asisten: ' . $model->idasisten;
$this->params['breadcrumbs'][] = ['label' => 'Asistens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idasisten, 'url' => ['view', 'idasisten' => $model->idasisten]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asisten-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
