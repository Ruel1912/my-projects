<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id ID
 * @property string $title Заголовок услуги
 * @property string $smal_title Подзаголовок услуги
 * @property string $benefits Преимущества
 * @property string $image Фоновое изображение
 * @property string $date Дата
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'smal_title', 'benefits', 'image'], 'required'],
            [['date'], 'safe'],
            [['title', 'smal_title', 'benefits', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок услуги',
            'smal_title' => 'Подзаголовок услуги',
            'benefits' => 'Преимущества',
            'image' => 'Фоновое изображение',
            'date' => 'Дата',
        ];
    }
}
