<?php

use yii\grid\GridView;

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
    ]
]);



