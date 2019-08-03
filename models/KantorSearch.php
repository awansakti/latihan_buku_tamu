<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kantor;

/**
 * KantorSearch represents the model behind the search form of `app\models\Kantor`.
 */
class KantorSearch extends Kantor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kantor'], 'integer'],
            [['nama_kantor', 'alamat_kantor', 'telepon_kantor'], 'safe'],
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
        $query = Kantor::find();

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
            'id_kantor' => $this->id_kantor,
        ]);

        $query->andFilterWhere(['like', 'nama_kantor', $this->nama_kantor])
            ->andFilterWhere(['like', 'alamat_kantor', $this->alamat_kantor])
            ->andFilterWhere(['like', 'telepon_kantor', $this->telepon_kantor]);

        return $dataProvider;
    }
}
