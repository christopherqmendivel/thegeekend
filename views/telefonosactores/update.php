<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Telefonosactores $model */

$this->title = 'Update Telefonosactores: ' . $model->idtelefono;
$this->params['breadcrumbs'][] = ['label' => 'Telefonosactores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtelefono, 'url' => ['view', 'idtelefono' => $model->idtelefono]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="telefonosactores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
