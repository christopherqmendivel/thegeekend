<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Participan $model */

$this->title = 'Create Participan';
$this->params['breadcrumbs'][] = ['label' => 'Participans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
