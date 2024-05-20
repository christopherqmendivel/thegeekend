<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Actores $model */

$this->title = $model->idactores;
$this->params['breadcrumbs'][] = ['label' => 'Actores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="actores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idactores' => $model->idactores], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idactores' => $model->idactores], [
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
            'idactores',
            'dni',
            'nombre',
            'nombrepersonaje',
            'tipo',
            'nombrepelioserie',
            'sinopsis',
            'temporadas',
        ],
    ]) ?>

</div>
