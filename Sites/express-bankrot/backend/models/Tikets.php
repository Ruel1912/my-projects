<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tikets".
 *
 * @property int $id ID
 * @property int $user_id ID юзера
 * @property string $date дата
 * @property int $status открыт\закрыт
 * @property MessageTiket[] $messages
 */
class Tikets extends \yii\db\ActiveRecord
{

    const STATUS_CLOSED = 0;
    const STATUS_OPENED = 1;

    public static $textStatus = [
        self::STATUS_OPENED => 'открыт',
        self::STATUS_CLOSED => 'закрыт',
    ];



    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tikets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'status'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'ID юзера',
            'date' => 'дата',
            'status' => 'открыт\\закрыт',
        ];
    }

    public function getMessages() {
        return $this->hasMany(MessageTiket::class, ['tiket_id' => 'id']);
    }
}
