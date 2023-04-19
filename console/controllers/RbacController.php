<?php

namespace console\controllers;

use Exception;
use yii\console\Controller;

class RbacController extends Controller
{

    /**
     * @throws Exception
     */
    public function actionInit()
    {

        $auth = \Yii::$app->authManager;
        $auth->removeAll();

        $adminPanel = $auth->createPermission('adminPanel');
        $adminPanel->description = 'Панель администратора';
        $auth->add($adminPanel);

        $createArticle = $auth->createPermission('createArticle');
        $createArticle->description = 'Create a article';
        $auth->add($createArticle);

        $updateArticle = $auth->createPermission('updateArticle');
        $updateArticle->description = 'Update article';
        $auth->add($updateArticle);

        $deleteArticle = $auth->createPermission('deleteArticle');
        $deleteArticle->description = 'Delete article';
        $auth->add($deleteArticle);

        $user = $auth->createRole('user');
        $user->description = 'Пользователь';
        $auth->add($user);
        $auth->addChild($user, $createArticle);

        $administrator = $auth->createRole('administrator');
        $administrator->description = 'Администратор';
        $auth->add($administrator);
        $auth->addChild($administrator, $updateArticle);
        $auth->addChild($administrator, $deleteArticle);

        $auth->assign($administrator, 1);
    }

}