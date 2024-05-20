<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Torneos $model */

$this->title = $model->idtorneos;
$this->params['breadcrumbs'][] = ['label' => 'Torneos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="torneos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idtorneos' => $model->idtorneos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idtorneos' => $model->idtorneos], [
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
            'idtorneos',
            'juego',
            'modojuego',
            'modalidad',
            'fechahora',
        ],
    ]) ?>

</div>
