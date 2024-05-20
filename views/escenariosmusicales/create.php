<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Escenariosmusicales $model */

$this->title = 'Create Escenariosmusicales';
$this->params['breadcrumbs'][] = ['label' => 'Escenariosmusicales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escenariosmusicales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
