<?php

use yii\bootstrap5\Html;
use yii\grid\GridView;
use yii\helpers\Url;

echo GridView::widget([
    'dataProvider' => $dataProvider,

    'columns' => [
        'id',
        'username',
        'email',

        ['class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'buttons'=> [

                'update' => function ($url) {
                    $url = Url::to(['update-user']);
                    return Html::a('update', $url, [
                        'title' => Yii::t('app', 'user-update'),
                    ]);
                },
                'delete' => function ($url) {
                    $url = Url::to(['delete-user']);
                    return Html::a('delete', $url, [
                        'title' => Yii::t('app', 'user-delete'),
                    ]);
                },

            ],

        ],

    ]
]);



