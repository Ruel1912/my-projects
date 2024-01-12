<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_payments".
 *
 * @property int $id
 * @property int $user_id
 * @property string $date_create
 * @property string $date_exp
 * @property string $bitrix_pay_id
 * @property string $link_payment
 * @property float $expected_val
 * @property float|null $val
 * @property int $status
 */
class UserPayments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'expected_val', 'status', 'bitrix_pay_id'], 'required'],
            [['user_id', 'status'], 'integer'],
            [['date_create', 'date_exp', 'bitrix_pay_id', 'link_payment'], 'safe'],
            [['expected_val', 'val'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'date_create' => 'Date Create',
            'date_exp' => 'Date Exp',
            'expected_val' => 'Expected Val',
            'val' => 'Val',
            'status' => 'Status',
        ];
    }
}
