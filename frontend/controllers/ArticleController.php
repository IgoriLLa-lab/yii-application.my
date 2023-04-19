<?php

namespace frontend\controllers;

use common\models\Article;
use common\models\User;
use Yii;
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

        if ($model->load(Yii::$app->request->post())){
            $model->user_id = Yii::$app->user->getId();
            $model->save();

            $this->refresh();
        }

        return $this->render('create-article', ['model' => $model]);
    }

}