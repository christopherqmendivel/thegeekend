<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Bandassonoras $model */

$this->title = $model->idbs;
$this->params['breadcrumbs'][] = ['label' => 'Bandassonoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bandassonoras-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idbs' => $model->idbs], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idbs' => $model->idbs], [
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
            'idbs',
            'dni',
            'nombre',
            'premio',
        ],
    ]) ?>

</div>
