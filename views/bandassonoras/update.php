<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bandassonoras $model */

$this->title = 'Update Bandassonoras: ' . $model->idbs;
$this->params['breadcrumbs'][] = ['label' => 'Bandassonoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idbs, 'url' => ['view', 'idbs' => $model->idbs]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bandassonoras-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
