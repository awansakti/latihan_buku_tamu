<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * This is the model class for table "tamu".
 *
 * @property int $id_tamu
 * @property string $nama_tamu
 * @property string $nik_tamu
 * @property string $gender_tamu
 * @property int $id_kantor
 * @property string $alamat_kantor
 * @property string $tanggal_input
 * @property string $keperluan_tamu
 * @property int $id_keterangan
 * @property string $foto
 *
 * @property Kantor $kantor
 * @property Keterangan $keterangan
 */
class Tamu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tamu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_tamu', 'nik_tamu', 'gender_tamu', 'id_kantor'], 'required'],
            [['gender_tamu', 'keperluan_tamu'], 'string'],
            [['id_kantor', 'id_keterangan'], 'integer'],
            [['tanggal_input'], 'safe'],
            [['nama_tamu', 'nik_tamu', 'alamat_kantor'], 'string', 'max' => 300],
            [['foto'], 'file', 'skipOnEmpty' => true , 'extensions'=> 'jpg, png, jpeg'],
            [['id_kantor'], 'exist', 'skipOnError' => true, 'targetClass' => Kantor::className(), 'targetAttribute' => ['id_kantor' => 'id_kantor']],
            [['id_keterangan'], 'exist', 'skipOnError' => true, 'targetClass' => Keterangan::className(), 'targetAttribute' => ['id_keterangan' => 'id_keterangan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tamu' => 'Id Tamu',
            'nama_tamu' => 'Nama Tamu',
            'nik_tamu' => 'Nomor Identitas ( KTP / SIM )',
            'gender_tamu' => 'Jenis Kelamin',
            'id_kantor' => 'Kantor',
            'alamat_kantor' => 'Alamat Kantor',
            'tanggal_input' => 'Waktu dan Tanggal',
            'keperluan_tamu' => 'Keperluan Tamu',
            'id_keterangan' => 'Keterangan',
            'foto' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKantor()
    {
        return $this->hasOne(Kantor::className(), ['id_kantor' => 'id_kantor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeterangan()
    {
        return $this->hasOne(Keterangan::className(), ['id_keterangan' => 'id_keterangan']);
    }
}
