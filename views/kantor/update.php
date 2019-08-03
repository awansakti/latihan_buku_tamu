<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kantor */

$this->title = 'Ubah Kantor: ' . $model->id_kantor;
$this->params['breadcrumbs'][] = ['label' => 'Kantors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kantor, 'url' => ['view', 'id' => $model->id_kantor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kantor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
