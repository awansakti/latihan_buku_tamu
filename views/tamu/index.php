<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Kantor;
use app\models\Keterangan;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TamuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buku Tamu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tamu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Input Tamu', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cetak Data', ['export'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id_tamu',
            'nama_tamu',
            'nik_tamu',
            'gender_tamu',
           // 'id_kantor',
           [
            'attribute'=>'id_kantor',
            'value'=>'kantor.nama_kantor',
            'filter'=>ArrayHelper::map(Kantor::find()->all(), 'id_kantor','nama_kantor'),

                ],
           // 'alamat_kantor',
           [
            'attribute'=>'alamat_kantor',
            'value'=>'kantor.alamat_kantor',
            'filter'=>ArrayHelper::map(Kantor::find()->all(),'id_kantor','alamat_kantor'),

                ],
            'tanggal_input',
            'keperluan_tamu:ntext',
            //'id_keterangan',
            [
                'attribute'=>'id_keterangan',
                'value'=>'keterangan.nama_keterangan',
                'filter'=>ArrayHelper::map(Keterangan::find()->all(),'id_keterangan','nama_keterangan'),
    
                    ],
          //  'foto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
