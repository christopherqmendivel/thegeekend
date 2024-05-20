<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Torneos $model */

$this->title = 'Update Torneos: ' . $model->idtorneos;
$this->params['breadcrumbs'][] = ['label' => 'Torneos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtorneos, 'url' => ['view', 'idtorneos' => $model->idtorneos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="torneos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
