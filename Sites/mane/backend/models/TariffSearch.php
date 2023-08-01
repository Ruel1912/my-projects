<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tariff;

/**
 * TariffSearch represents the model behind the search form of `backend\models\Tariff`.
 */
class TariffSearch extends Tariff
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'full_price', 'first_pay', 'months'], 'integer'],
            [['name', 'props', 'date'], 'safe'],
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
        $query = Tariff::find();

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
            'id' => $this->id,
            'full_price' => $this->full_price,
            'first_pay' => $this->first_pay,
            'months' => $this->months,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'props', $this->props]);

        return $dataProvider;
    }
}
