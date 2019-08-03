<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Keterangan */

$this->title = 'Ubah Keterangan: ' . $model->id_keterangan;
$this->params['breadcrumbs'][] = ['label' => 'Keterangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_keterangan, 'url' => ['view', 'id' => $model->id_keterangan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="keterangan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
