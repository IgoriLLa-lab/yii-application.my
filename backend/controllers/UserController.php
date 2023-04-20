<?php

namespace backend\controllers;

use common\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use yii\web\Controller;

class UserController extends Controller
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
                        'actions' => ['index', 'view', 'user', 'update', 'delete', 'user-index', 'update-user'],
                        'roles' => ['administrator'],
                    ],
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
     * Displays all user.
     *
     */
    public function actionUserIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()
        ]);

        $model = User::find()->all();

        return $this->render('user-index', compact('dataProvider', 'model'));
    }

    public function actionUpdate($id){
        $model = User::findOne($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->update();
            $this->render('update', ['model' => $model]);
        }

        return $this->render('update', ['model' => $model]);
    }

    /**
     * @throws StaleObjectException
     * @throws \Throwable
     */
    public function actionDelete($id)
    {
        $model = User::findOne($id);

        if ($model) {
            $model->delete();
        }

        return $this->goHome();
    }

}