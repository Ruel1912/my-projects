<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "notice".
 *
 * @property int $id ID
 * @property int $user_id ID Пользователя
 * @property string $notice_params Параментры уведомлений
 */
class Notice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'notice_params'], 'required'],
            [['user_id'], 'integer'],
            [['notice_params'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'ID Пользователя',
            'notice_params' => 'Параментры уведомлений',
        ];
    }
}
