<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Coleccionables $model */

$this->title = $model->idcolecc;
$this->params['breadcrumbs'][] = ['label' => 'Coleccionables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="coleccionables-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idcolecc' => $model->idcolecc], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idcolecc' => $model->idcolecc], [
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
            'idcolecc',
            'nombre',
            'material',
            'edicion',
            'tomo',
            'talla',
            'medida',
            'precio',
        ],
    ]) ?>

</div>
