<?php

namespace backend\controllers;

use common\models\Article;
use Throwable;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\StaleObjectException;
use yii\web\Controller;

class ArticleController extends Controller
{

    /**
     * Выводим
     *
     * @return string
     */
    public function actionArticleIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()
        ]);

        return $this->render('article-index', ['dataProvider' => $dataProvider]);
    }

        public function actionView($id)
    {
        $model = Article::findOne($id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * @throws StaleObjectException
     * @throws Throwable
     */
    public function actionDelete($id)
    {
        $model = Article::findOne($id);

        if ($model) {
            $model->delete();

            return $this->redirect('view');
        }
        return '';
    }

    public function actionUpdate(int $id)
    {
        $model = Article::findOne($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->update();

            return $this->render('view', ['model' => $model]);
        }

        return $this->render('update', ['model' => $model]);
    }

}