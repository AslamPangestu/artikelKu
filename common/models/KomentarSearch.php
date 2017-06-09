<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Komentar;

/**
 * KomentarSearch represents the model behind the search form about `common\models\Komentar`.
 */
class KomentarSearch extends Komentar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_komentar', 'id_artikel'], 'integer'],
            [['nama', 'email', 'komentar', 'created_time'], 'safe'],
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
        $query = Komentar::find();

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
            'id_komentar' => $this->id_komentar,
            'id_artikel' => $this->id_artikel,
            'created_time' => $this->created_time,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'komentar', $this->komentar]);

        return $dataProvider;
    }
}
