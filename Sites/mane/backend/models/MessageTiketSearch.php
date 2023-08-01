<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MessageTiket;

/**
 * MessageTiketSearch represents the model behind the search form of `backend\models\MessageTiket`.
 */
class MessageTiketSearch extends MessageTiket
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tiket_id', 'user_id', 'isSupport'], 'integer'],
            [['message', 'attachments', 'date'], 'safe'],
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
        $query = MessageTiket::find();

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
            'tiket_id' => $this->tiket_id,
            'user_id' => $this->user_id,
            'date' => $this->date,
            'isSupport' => $this->isSupport,
        ]);

        $query->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'attachments', $this->attachments]);

        return $dataProvider;
    }
}
