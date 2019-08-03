<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kantor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kantor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_kantor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_kantor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telepon_kantor')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
