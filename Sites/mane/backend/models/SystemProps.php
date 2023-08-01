<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "system_props".
 *
 * @property int $id
 * @property string $property
 * @property string $value
 */
class SystemProps extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_props';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['property', 'value'], 'required'],
            [['property'], 'string', 'max' => 255],
            [['value'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'property' => 'Property',
            'value' => 'Value',
        ];
    }
}
