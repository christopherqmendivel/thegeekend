<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Venden $model */

$this->title = 'Update Venden: ' . $model->idvenden;
$this->params['breadcrumbs'][] = ['label' => 'Vendens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idvenden, 'url' => ['view', 'idvenden' => $model->idvenden]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="venden-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
