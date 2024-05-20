<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Venden $model */

$this->title = 'Create Venden';
$this->params['breadcrumbs'][] = ['label' => 'Vendens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venden-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
