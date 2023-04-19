<?php

use yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        ['class' => 'yii\grid\ActionColumn']
    ]
]);

?>

