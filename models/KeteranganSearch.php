<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Keterangan;

/**
 * KeteranganSearch represents the model behind the search form of `app\models\Keterangan`.
 */
class KeteranganSearch extends Keterangan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_keterangan'], 'integer'],
            [['nama_keterangan'], 'safe'],
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
        $query = Keterangan::find();

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
            'id_keterangan' => $this->id_keterangan,
        ]);

        $query->andFilterWhere(['like', 'nama_keterangan', $this->nama_keterangan]);

        return $dataProvider;
    }
}
