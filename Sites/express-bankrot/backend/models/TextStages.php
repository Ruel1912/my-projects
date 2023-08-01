<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "text_stages".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $text
 * @property int $deal_id
 * @property string $stage_id
 */
class TextStages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'text_stages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'deal_id', 'stage_id'], 'required'],
            [['user_id', 'deal_id'], 'integer'],
            [['text'], 'string'],
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
            'user_id' => 'User ID',
            'text' => 'Text',
            'deal_id' => 'Deal ID',
            'stage_id' => 'Stage ID',
        ];
    }
}
