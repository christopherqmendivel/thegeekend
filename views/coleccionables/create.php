<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Coleccionables $model */

$this->title = 'Create Coleccionables';
$this->params['breadcrumbs'][] = ['label' => 'Coleccionables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coleccionables-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
