<?php

namespace backend\controllers;

use common\models\User;
use yii\data\ActiveDataProvider;
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
                        'actions' => ['index', 'view', 'user', 'update', 'delete', 'user-index'],
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
            'query' => User::find()->where('id')
        ]);

        return $this->render('user-index', compact('dataProvider'));
    }

}