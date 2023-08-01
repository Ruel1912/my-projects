<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "knowledge_base".
 *
 * @property int $id ID
 * @property string $name Название
 * @property string $video Видео
 * @property string $date Дата создания
 */
class KnowledgeBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'knowledge_base';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'video'], 'required'],
            [['date'], 'safe'],
            [['name', 'video'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'video' => 'Видео',
            'date' => 'Дата создания',
        ];
    }
}
