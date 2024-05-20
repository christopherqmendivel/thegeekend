<?php

use app\models\RegistroUsuarios;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Registrar Usuario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registro-usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registrar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idjugadores',
            'dni',
            'nick',
            'nombre',
            'username',
            'nombregrupo',
            'email',
            'contrasena',

 
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RegistroUsuarios $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idjugadores' => $model->idjugadores]);
                 }
            ],
        ],
    ]); ?>


</div>
