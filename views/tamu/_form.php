<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Kantor;
use app\models\Keterangan;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Tamu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tamu-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); 
     $pgl_kantor = ArrayHelper::map(Kantor::find()->asArray()->all(),'id_kantor','nama_kantor');
     $pgl_keterangan = ArrayHelper::map(Keterangan::find()->asArray()->all(),'id_keterangan','nama_keterangan');
    ?>

    <?= $form->field($model, 'nama_tamu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nik_tamu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender_tamu')->dropDownList([ 'pria' => 'Pria', 'wanita' => 'Wanita', ], ['prompt' => '']) ?>

    <?php //= $form->field($model, 'id_kantor')->textInput() ?>

    <?= $form->field($model, 'id_kantor')->dropDownList($pgl_kantor,['prompt' =>'-Pilih Kantor-']) ?>

    <?php //= $form->field($model, 'alamat_kantor')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'tanggal_input')->textInput() ?>
    <?= $form->field($model, 'tanggal_input')->widget(DateTimePicker::className(), [
    'name' => 'tanggal_input',
    'type' => DateTimePicker::TYPE_INPUT,
     	'pluginOptions' => [
            'showSeconds' => true
	    ]
        ]);?>

    <?= $form->field($model, 'keperluan_tamu')->textarea(['rows' => 5]) ?>

    <?php //= $form->field($model, 'id_keterangan')->textInput() ?>

    <?= $form->field($model, 'id_keterangan')->dropDownList($pgl_keterangan,['prompt' =>'---']) ?>

    <?= $form->field($model, 'foto')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
