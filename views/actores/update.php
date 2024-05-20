<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Actores $model */

$this->title = 'Update Actores: ' . $model->idactores;
$this->params['breadcrumbs'][] = ['label' => 'Actores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idactores, 'url' => ['view', 'idactores' => $model->idactores]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="actores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
