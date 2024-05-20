<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Organizan $model */

$this->title = 'Create Organizan';
$this->params['breadcrumbs'][] = ['label' => 'Organizans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
