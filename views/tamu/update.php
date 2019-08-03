<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tamu */

$this->title = 'Ubah data Tamu: ' . $model->id_tamu;
$this->params['breadcrumbs'][] = ['label' => 'Buku Tamu', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tamu, 'url' => ['view', 'id' => $model->id_tamu]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tamu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
