<?php

use yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'username',
        'email',
        'created_at',

        ['class' => 'yii\grid\ActionColumn'

        ],

    ]
]);



