<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id ID
 * @property string $category Категория
 * @property string $title Заголовок
 * @property string $link Ссылка на статью
 * @property string $sub_title Подзаголовок
 * @property string $content Содержание статьи
 * @property string $image Иллюстрация
 * @property int $views Просмотры
 * @property int $likes Лайки
 * @property int $dizlike Не нравится
 * @property string $date Дата публикации
 * @property string $meta_desc Мета описание
 * @property string $meta_title Мета заголовок
 * @property string $keywords Ключевые слова
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'title', 'link', 'sub_title', 'content', 'image', 'views', 'likes', 'dizlike', 'meta_desc', 'meta_title', 'keywords'], 'required'],
            [['content'], 'string'],
            [['views', 'likes', 'dizlike'], 'integer'],
            [['date'], 'safe'],
            [['category', 'title', 'link', 'sub_title', 'image', 'meta_desc', 'meta_title', 'keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Категория',
            'title' => 'Заголовок',
            'link' => 'Ссылка на статью',
            'sub_title' => 'Подзаголовок',
            'content' => 'Содержание статьи',
            'image' => 'Иллюстрация',
            'views' => 'Просмотры',
            'likes' => 'Лайки',
            'dizlike' => 'Не нравится',
            'date' => 'Дата публикации',
            'meta_desc' => 'Мета описание',
            'meta_title' => 'Мета заголовок',
            'keywords' => 'Ключевые слова',
        ];
    }
}
