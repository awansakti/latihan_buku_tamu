<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kantor".
 *
 * @property int $id_kantor
 * @property string $nama_kantor
 * @property string $alamat_kantor
 * @property string $telepon_kantor
 *
 * @property Tamu[] $tamus
 */
class Kantor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kantor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kantor', 'alamat_kantor', 'telepon_kantor'], 'required'],
            [['nama_kantor', 'alamat_kantor', 'telepon_kantor'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kantor' => 'Id Kantor',
            'nama_kantor' => 'Nama Kantor',
            'alamat_kantor' => 'Alamat Kantor',
            'telepon_kantor' => 'Telepon Kantor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTamus()
    {
        return $this->hasMany(Tamu::className(), ['id_kantor' => 'id_kantor']);
    }
}
