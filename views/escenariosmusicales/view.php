<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Escenariosmusicales $model */

$this->title = $model->idesmu;
$this->params['breadcrumbs'][] = ['label' => 'Escenariosmusicales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="escenariosmusicales-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idesmu' => $model->idesmu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idesmu' => $model->idesmu], [
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
            'idesmu',
            'dni',
            'nombre',
            'nombregrupo',
            'instrumento',
            'categoria',
        ],
    ]) ?>

</div>
