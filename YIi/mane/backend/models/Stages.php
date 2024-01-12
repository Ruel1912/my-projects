<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "stages".
 *
 * @property int $id
 * @property string $name
 * @property string|null $small_desc
 * @property string|null $need_to_do
 * @property int $files_provide
 * @property int $files_accept
 * @property string $status
 * @property int|null $days
 */
class Stages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['small_desc', 'need_to_do'], 'string'],
            [['files_provide', 'files_accept', 'days'], 'integer'],
            [['name', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'small_desc' => 'Small Desc',
            'need_to_do' => 'Need To Do',
            'files_provide' => 'Files Provide',
            'files_accept' => 'Files Accept',
            'status' => 'Status',
            'days' => 'Days',
        ];
    }
}
