<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Asisten $model */

$this->title = $model->idasisten;
$this->params['breadcrumbs'][] = ['label' => 'Asistens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asisten-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idasisten' => $model->idasisten], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idasisten' => $model->idasisten], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idasisten',
            'ideventos',
            'idactores',
        ],
    ]) ?>

</div>
