<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "keterangan".
 *
 * @property int $id_keterangan
 * @property string $nama_keterangan
 *
 * @property Tamu[] $tamus
 */
class Keterangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'keterangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_keterangan'], 'required'],
            [['nama_keterangan'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_keterangan' => 'Id Keterangan',
            'nama_keterangan' => 'Nama Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTamus()
    {
        return $this->hasMany(Tamu::className(), ['id_keterangan' => 'id_keterangan']);
    }
}
