<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Organizan $model */

$this->title = $model->idparticipan;
$this->params['breadcrumbs'][] = ['label' => 'Organizans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="organizan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idparticipan' => $model->idparticipan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idparticipan' => $model->idparticipan], [
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
            'idparticipan',
            'ideventos',
            'idtorneos',
        ],
    ]) ?>

</div>
