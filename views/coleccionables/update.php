<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Coleccionables $model */

$this->title = 'Update Coleccionables: ' . $model->idcolecc;
$this->params['breadcrumbs'][] = ['label' => 'Coleccionables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcolecc, 'url' => ['view', 'idcolecc' => $model->idcolecc]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coleccionables-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
