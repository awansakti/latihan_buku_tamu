<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\models\Kantor;
use app\models\Keterangan;

/* @var $this yii\web\View */
/* @var $model app\models\Tamu */

$this->title = $model->nama_tamu;
$this->params['breadcrumbs'][] = ['label' => 'Buku Tamu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tamu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah Data', ['update', 'id' => $model->id_tamu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data', ['delete', 'id' => $model->id_tamu], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin akan menghapus data ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<div class=row>

    <div class="col-md-7"> 

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         //   'id_tamu',
            'nama_tamu',
            'nik_tamu',
            'gender_tamu',
          //  'kantor.id_kantor',
          //  'alamat_kantor',
            'tanggal_input',
            'keperluan_tamu:ntext',
            //'keterangan.id_keterangan',
          //  'foto',
        ],
    ]) ?>
</div>
    <div class="col-md-5">
            <?php
            if (!empty($model->foto)){
            ?>
             
            <img src=" <?= yii::$app->request->baseUrl; ?>/gambar/<?= $model->foto; ?> " width="40%"/>
            <?php 
            }else {
               ?>
                <img src=" <?= yii::$app->request->baseUrl; ?>/gambar/no.png " width="40%"/>
            <?php } ?>
           
         </div>
       

</div>


</div>
