<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Eventos $model */

$this->title = $model->ideventos;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="eventos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ideventos' => $model->ideventos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ideventos' => $model->ideventos], [
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
            'ideventos',
            'nombre',
            'lugar',
            'finicio',
            'ffinal',
            'idbs',
            'idesmu',
        ],
    ]) ?>

</div>
