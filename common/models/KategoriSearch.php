<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Kategori;

/**
 * KategoriSearch represents the model behind the search form about `common\models\Kategori`.
 */
class KategoriSearch extends Kategori
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kategori'], 'integer'],
            [['nama_kategori'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Kategori::find();

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
            'id_kategori' => $this->id_kategori,
        ]);

        $query->andFilterWhere(['like', 'nama_kategori', $this->nama_kategori]);

        return $dataProvider;
    }
}
