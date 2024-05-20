<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\RegistroUsuarios $model */

$this->title = $model->idjugadores;
$this->params['breadcrumbs'][] = ['label' => 'Registro Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="registro-usuarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idjugadores], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idjugadores], [
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
            'idjugadores',
            'dni',
            'nick',
            'nombre',
            'nombregrupo',
            'email:email',
            //'contraseña', // Cambiado de contraseña a contrasena
            'contrasena',
        ],
    ]) ?>

</div>
