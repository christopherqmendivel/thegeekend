<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Asisten $model */

$this->title = 'Create Asisten';
$this->params['breadcrumbs'][] = ['label' => 'Asistens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asisten-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
