<?php

namespace backend\controllers;

use common\models\Article;
use common\models\LoginForm;
use common\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\StaleObjectException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'user', 'update', 'delete', 'update-user', 'user-index'],
                        'roles' => ['administrator'],
                    ],
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionView($id)
    {
        $model = Article::findOne($id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionUser()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()
                ->select(['user.*'])
        ]);

        return $this->render('user', ['dataProvider' => $dataProvider]);
    }

    public function actionUpdate(int $id)
    {
        $model = Article::findOne($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->update();
            return $this->goHome();
        }

        return $this->render('edit-article', ['model' => $model]);
    }

    /**
     * @throws StaleObjectException
     * @throws \Throwable
     */
    public function actionDelete($id)
    {
        $model = Article::findOne($id);

        if ($model) {
            $model->delete();
        }

        return $this->goHome();
    }

    public function actionUpdateUser($id){
        $model = User::findOne($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->update();
            $this->render('update-user', ['model' => $model]);
        }

        return $this->render('update-user', ['model' => $model]);
    }

}
