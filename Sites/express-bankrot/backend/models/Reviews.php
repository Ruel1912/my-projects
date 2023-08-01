<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id ID
 * @property string $fio Имя
 * @property string $status Положение
 * @property string $region Регион
 * @property string $date_application Дата обращения
 * @property int $summ Сумма долгов
 * @property string $bankruptcy_date Дата банкротства
 * @property string $case_number Номер дела
 * @property string $link_case Ссылка на дело
 * @property string|null $reviews Отзыв клиента
 * @property string|null $video_link Ссылка на видео
 * @property string $date_add Дата добавления
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
            [['fio', 'status', 'region', 'date_application', 'summ'], 'required'],
            [['date_application', 'bankruptcy_date', 'date_add'], 'safe'],
            [['summ'], 'integer'],
            [['reviews'], 'string'],
            [['fio', 'status', 'region', 'case_number', 'link_case', 'video_link'], 'string', 'max' => 255],
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
            'status' => 'Положение',
            'region' => 'Регион',
            'date_application' => 'Дата обращения',
            'summ' => 'Сумма долгов',
            'bankruptcy_date' => 'Дата банкротства',
            'case_number' => 'Номер дела',
            'link_case' => 'Ссылка на дело',
            'reviews' => 'Отзыв клиента',
            'video_link' => 'Ссылка на видео',
            'date_add' => 'Дата добавления',
        ];
    }
}