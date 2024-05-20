<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Participan $model */

$this->title = 'Update Participan: ' . $model->idparticipan;
$this->params['breadcrumbs'][] = ['label' => 'Participans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idparticipan, 'url' => ['view', 'idparticipan' => $model->idparticipan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="participan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
