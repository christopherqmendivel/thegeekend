<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Venden $model */

$this->title = $model->idvenden;
$this->params['breadcrumbs'][] = ['label' => 'Vendens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="venden-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idvenden' => $model->idvenden], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idvenden' => $model->idvenden], [
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
            'idvenden',
            'ideventos',
            'idcolecc',
        ],
    ]) ?>

</div>
