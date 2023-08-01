<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "completed".
 *
 * @property int $id ID
 * @property int $summ Сумма долгов
 * @property string $case_number Номер дела
 * @property string $image_case Скрин первой страницы дела
 * @property string $link_case Ссылка на дело
 * @property string $date_add Дата добавления
 */
class Completed extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'completed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['summ', 'case_number', 'image_case', 'link_case'], 'required'],
            [['summ'], 'integer'],
            [['date_add'], 'safe'],
            [['case_number', 'image_case', 'link_case'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'summ' => 'Сумма долгов',
            'case_number' => 'Номер дела',
            'image_case' => 'Скрин первой страницы дела',
            'link_case' => 'Ссылка на дело',
            'date_add' => 'Дата добавления',
        ];
    }
}
