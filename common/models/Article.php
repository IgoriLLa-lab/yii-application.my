<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "production".
 *
 * @property int $id
 * @property string $name
 * @property string $article
 */
class Article extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return 'articles';
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['name', 'article'], 'required'],
            [['name', 'article'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название Статьи',
            'article' => 'Статья',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['user_id' => 'id']);
    }

    /*
 * Возвращает массив объектов модели Article
 */
    public function getAllArticles(): array
    {
        return $this->find()->all();
    }

}