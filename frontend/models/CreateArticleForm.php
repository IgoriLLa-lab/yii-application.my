<?php

namespace frontend\models;

use yii\base\Model;

class CreateArticleForm extends Model
{

    public string $name;
    public string $article;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'article'], 'required'],
        ];
    }

}