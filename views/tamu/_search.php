<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TamuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tamu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tamu') ?>

    <?= $form->field($model, 'nama_tamu') ?>

    <?= $form->field($model, 'nik_tamu') ?>

    <?= $form->field($model, 'gender_tamu') ?>

    <?= $form->field($model, 'id_kantor') ?>

    <?php // echo $form->field($model, 'alamat_kantor') ?>

    <?php // echo $form->field($model, 'tanggal_input') ?>

    <?php // echo $form->field($model, 'keperluan_tamu') ?>

    <?php // echo $form->field($model, 'id_keterangan') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
