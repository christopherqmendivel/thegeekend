<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Telefonosactores $model */

$this->title = 'Create Telefonosactores';
$this->params['breadcrumbs'][] = ['label' => 'Telefonosactores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telefonosactores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
