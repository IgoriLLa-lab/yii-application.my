<?php

namespace frontend\controllers;

use common\models\Article;
use yii\web\Controller;

class ArticleController extends Controller
{

    /**
     * Создание статьи и отрисовка формы
     *
     * @return string
     */
    public function actionCreateArticle() : string
    {
        $model = new Article();

        return $this->render('create-article', ['model' => $model]);
    }

}