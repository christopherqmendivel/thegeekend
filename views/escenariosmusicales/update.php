<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Escenariosmusicales $model */

$this->title = 'Update Escenariosmusicales: ' . $model->idesmu;
$this->params['breadcrumbs'][] = ['label' => 'Escenariosmusicales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idesmu, 'url' => ['view', 'idesmu' => $model->idesmu]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="escenariosmusicales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
