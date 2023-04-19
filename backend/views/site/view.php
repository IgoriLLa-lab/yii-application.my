<?php

use yii\widgets\DetailView;
?>

<h2>Статья</h2>

<?php
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'name',               // title attribute (in plain text)
        'article',    // description attribute in HTML
    ],
]);
?>