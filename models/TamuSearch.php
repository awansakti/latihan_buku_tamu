<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tamu;

/**
 * TamuSearch represents the model behind the search form of `app\models\Tamu`.
 */
class TamuSearch extends Tamu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tamu', 'id_kantor', 'id_keterangan'], 'integer'],
            [['nama_tamu', 'nik_tamu', 'gender_tamu', 'alamat_kantor', 'tanggal_input', 'keperluan_tamu', 'foto'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tamu::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_tamu' => $this->id_tamu,
            'id_kantor' => $this->id_kantor,
            'tanggal_input' => $this->tanggal_input,
            'id_keterangan' => $this->id_keterangan,
        ]);

        $query->andFilterWhere(['like', 'nama_tamu', $this->nama_tamu])
            ->andFilterWhere(['like', 'nik_tamu', $this->nik_tamu])
            ->andFilterWhere(['like', 'gender_tamu', $this->gender_tamu])
            ->andFilterWhere(['like', 'alamat_kantor', $this->alamat_kantor])
            ->andFilterWhere(['like', 'keperluan_tamu', $this->keperluan_tamu])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
