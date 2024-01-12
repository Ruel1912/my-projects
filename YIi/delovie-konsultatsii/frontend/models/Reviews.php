<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id ID
 * @property string $fio Имя
 * @property string $region Регион
 * @property string $review Отзыв клиента
 * @property string $case_number Номер дела
 * @property string $image_case Скрин первой страницы дела
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fio', 'region', 'review', 'case_number'], 'required'],
            [['id'], 'integer'],
            [['review'], 'string'],
            [['fio', 'region', 'case_number', 'image_case'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Имя',
            'region' => 'Регион',
            'review' => 'Сообщение',
            'case_number' => 'Номер дела',
            'image_case' => 'Скриншот первой страницы',
        ];
    }
}