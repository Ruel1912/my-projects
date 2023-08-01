<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Completed;

/**
 * CompletedSearch represents the model behind the search form of `backend\models\Completed`.
 */
class CompletedSearch extends Completed
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'summ'], 'integer'],
            [['case_number', 'image_case', 'link_case', 'date_add'], 'safe'],
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
        $query = Completed::find();

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
            'summ' => $this->summ,
            'date_add' => $this->date_add,
        ]);

        $query->andFilterWhere(['like', 'case_number', $this->case_number])
            ->andFilterWhere(['like', 'image_case', $this->image_case])
            ->andFilterWhere(['like', 'link_case', $this->link_case]);

        return $dataProvider;
    }
}
