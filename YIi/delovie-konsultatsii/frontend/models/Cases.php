<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cases".
 *
 * @property int $id ID
 * @property string $case_number Номер дела
 * @property string $fio Имя
 * @property string $region Регион
 * @property int $debt Долг
 * @property int $debt_written Списано
 * @property string $date_application Дата
 */
class Cases extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['case_number', 'fio', 'region', 'debt', 'debt_written', 'date_application'], 'required'],
            [['debt', 'debt_written'], 'integer'],
            [['date_application'], 'safe'],
            [['case_number', 'fio', 'region'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'case_number' => 'Номер дела',
            'fio' => 'Имя',
            'region' => 'Регион',
            'debt' => 'Долг',
            'debt_written' => 'Списано',
            'date_application' => 'Дата',
            'image_case' => 'Скриншот первой страницы'
        ];
    }
}
