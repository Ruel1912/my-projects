<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "message_tiket".
 *
 * @property int $id ID
 * @property int $tiket_id ID Тикета
 * @property int $user_id ID юзера
 * @property string $message сообщение
 * @property string $attachments вложения
 * @property string $date дата
 * @property int $isSupport сообщение поддержки
 */
class MessageTiket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message_tiket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tiket_id', 'user_id', 'message'], 'required'],
            [['tiket_id', 'user_id', 'isSupport'], 'integer'],
            [['message'], 'string'],
            [['date'], 'safe'],
            [['attachments'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tiket_id' => 'ID Тикета',
            'user_id' => 'ID юзера',
            'message' => 'сообщение',
            'attachments' => 'вложения',
            'date' => 'дата',
            'isSupport' => 'сообщение поддержки',
        ];
    }
}
