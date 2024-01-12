<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "anketa".
 *
 * @property int $id
 * @property string $date
 * @property string $fio
 * @property string $phone
 * @property string $email
 * @property string $city
 * @property string $status_soc
 * @property string $work_place
 * @property string $marital_status
 * @property string $criminal_record
 * @property string $dependents
 * @property string $disability
 * @property string $credit_debt
 * @property string $other_debt
 * @property string $additional_audit_info
 * @property string $incoming_money
 * @property string $property
 * @property string $deals
 * @property string $rationale
 * @property string $cookie_token
 * @property string $client_param
 * @property string $msg
 * @property int $confirmed_status
 * @property int $send_to
 */
class Anketa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anketa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['fio', 'phone', 'city', 'cookie_token'], 'required'],
            [['status_soc', 'work_place', 'marital_status', 'criminal_record', 'dependents', 'disability', 'credit_debt', 'other_debt', 'additional_audit_info', 'incoming_money', 'property', 'deals', 'rationale', 'msg'], 'string'],
            [['confirmed_status', 'send_to'], 'integer'],
            [['fio', 'phone', 'email', 'city', 'cookie_token', 'client_param'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'fio' => 'Fio',
            'phone' => 'Phone',
            'email' => 'Email',
            'city' => 'City',
            'status_soc' => 'Status Soc',
            'work_place' => 'Work Place',
            'marital_status' => 'Marital Status',
            'criminal_record' => 'Criminal Record',
            'dependents' => 'Dependents',
            'disability' => 'Disability',
            'credit_debt' => 'Credit Debt',
            'other_debt' => 'Other Debt',
            'additional_audit_info' => 'Additional Audit',
            'incoming_money' => 'Incoming Money',
            'property' => 'Property',
            'deals' => 'Deals',
            'rationale' => 'Rationale',
            'cookie_token' => 'Cookie Token',
            'client_param' => 'Client Param',
            'confirmed_status' => 'Confirmed Status',
        ];
    }
}
