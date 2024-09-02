<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services__list".
 *
 * @property int $id
 * @property int $services_id
 * @property string $row
 *
 * @property Services $services
 */
class ServicesList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services__list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['services_id', 'row'], 'required'],
            [['services_id'], 'integer'],
            [['row'], 'string', 'max' => 100],
            [['services_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::class, 'targetAttribute' => ['services_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'services_id' => 'Services ID',
            'row' => 'Row',
        ];
    }

    /**
     * Gets query for [[Services]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasOne(Services::class, ['id' => 'services_id']);
    }
}
