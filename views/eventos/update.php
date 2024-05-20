<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Eventos $model */

$this->title = 'Update Eventos: ' . $model->ideventos;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ideventos, 'url' => ['view', 'ideventos' => $model->ideventos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="eventos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
