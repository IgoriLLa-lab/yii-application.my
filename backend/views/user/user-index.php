<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;



echo GridView::widget([
    'dataProvider' => $dataProvider,

    'columns' => [
        'id',
        'username',
        'email',

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',

            ]


//        ['class' => 'yii\grid\ActionColumn',
//            'template' => '{update} {delete}',
//            'header' => 'Actions',
//            'headerOptions' => ['style' => 'color:#337ab7'],
//            'buttons' => [
//
//                'update' => function ($url) {
//                    $url = Url::toRoute(["update-user"]);
//                    return Html::a('update', $url, [
//                        'title' => Yii::t('app', 'user-update'),
//                    ]);
//                },
//                'delete' => function ($url) {
//                    $url = Url::toRoute(['deleteuser']);
//                    return Html::a('delete', $url, [
//                        'title' => Yii::t('app', 'user-delete'),
//                    ]);
//                },
////                'urlCreator' => function ($action, $model, $key, $index) {
////                    if ($action === 'update-user') {
////                        $url ='index.php?r=user%2Fupdate-user='.Yii::$app->request->get("id")."&id=".$model->id;
////                        return $url;
////                    }
////
////
////                }
//
//            ],
//
//        ],

    ]
]);



