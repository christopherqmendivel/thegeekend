<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bandassonoras $model */

$this->title = 'Create Bandassonoras';
$this->params['breadcrumbs'][] = ['label' => 'Bandassonoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bandassonoras-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
