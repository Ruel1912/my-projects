<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Reviews;

/**
 * ReviewsSearch represents the model behind the search form of `backend\models\Reviews`.
 */
class ReviewsSearch extends Reviews
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'summ'], 'integer'],
            [['fio', 'status', 'region', 'date_application', 'bankruptcy_date', 'case_number', 'link_case', 'reviews', 'video_link', 'date_add'], 'safe'],
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
        $query = Reviews::find();

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
            'date_application' => $this->date_application,
            'summ' => $this->summ,
            'bankruptcy_date' => $this->bankruptcy_date,
            'date_add' => $this->date_add,
        ]);

        $query->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'case_number', $this->case_number])
            ->andFilterWhere(['like', 'link_case', $this->link_case])
            ->andFilterWhere(['like', 'reviews', $this->reviews])
            ->andFilterWhere(['like', 'video_link', $this->video_link]);

        return $dataProvider;
    }
}