<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tariff".
 *
 * @property int $id
 * @property string $name
 * @property string $props
 * @property int $full_price
 * @property int $first_pay
 * @property int $months
 * @property string $date
 */
class Tariff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tariff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'props', 'full_price', 'first_pay'], 'required'],
            [['props'], 'string'],
            [['full_price', 'first_pay', 'months'], 'integer'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'props' => 'Свойства',
            'full_price' => 'Полная цена',
            'first_pay' => 'Первый платеж',
            'months' => 'Длительность рассрочки, мес.',
            'date' => 'Дата',
        ];
    }
}
