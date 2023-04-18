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

    /*
 * Возвращает массив объектов модели Article
 */
    public function getArticles(): array
    {
        return $this->find()->all();
    }

}