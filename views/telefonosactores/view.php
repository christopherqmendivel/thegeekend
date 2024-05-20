<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Telefonosactores $model */

$this->title = $model->idtelefono;
$this->params['breadcrumbs'][] = ['label' => 'Telefonosactores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="telefonosactores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idtelefono' => $model->idtelefono], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idtelefono' => $model->idtelefono], [
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
            'idtelefono',
            'idactores',
            'telefono',
        ],
    ]) ?>

</div>
