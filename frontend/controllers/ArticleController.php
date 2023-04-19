<?php

namespace frontend\controllers;

use common\models\Article;
use common\models\User;
use Yii;use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class ArticleController extends Controller
{

    /**
     * Создание статьи и отрисовка формы
     *
     * @return string
     */
    public function actionCreateArticle()
    {
        $model = new Article();

        if (Yii::$app->user->can('createArticle')){
            if ($model->load(Yii::$app->request->post())){
                $model->user_id = Yii::$app->user->getId();
                $model->save();
                $this->refresh();
            }
            return $this->render('create-article', compact('model'));
        }

        return $this->goHome();

    }

}