<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengguna".
 *
 * @property int $id_pengguna
 * @property string $nama_pengguna
 * @property string $password_pengguna
 * @property string $email_pengguna
 */
class Pengguna extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengguna';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pengguna', 'password_pengguna', 'email_pengguna'], 'required'],
            [['nama_pengguna', 'password_pengguna', 'email_pengguna'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pengguna' => 'Id Pengguna',
            'nama_pengguna' => 'Nama Pengguna',
            'password_pengguna' => 'Password Pengguna',
            'email_pengguna' => 'Email Pengguna',
        ];
    }
}
