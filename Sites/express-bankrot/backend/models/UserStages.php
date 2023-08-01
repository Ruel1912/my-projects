<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_stages".
 *
 * @property int $id ID
 * @property int $user_id Пользователь
 * @property string $stage_id Стадия
 * @property int $deployments Загрузки
 * @property int $passed Стадия пройдена
 * @property int $sort Порядковый номер
 * @property string $date Дата
 * @property int $deployment_passed Файлы загружены
 * @property int $current_stage Это текущая стадия
 */
class UserStages extends \yii\db\ActiveRecord
{

    public static $needSync = [
        'C5:13',
        'C5:16',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_stages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'stage_id', 'sort'], 'required'],
            [['user_id', 'deployments', 'passed', 'sort', 'deployment_passed', 'current_stage'], 'integer'],
            [['date'], 'safe'],
            [['stage_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'stage_id' => 'Стадия',
            'deployments' => 'Загрузки',
            'passed' => 'Стадия пройдена',
            'sort' => 'Порядковый номер',
            'date' => 'Дата',
            'deployment_passed' => 'Файлы загружены',
            'current_stage' => 'Это текущая стадия',
        ];
    }
}
