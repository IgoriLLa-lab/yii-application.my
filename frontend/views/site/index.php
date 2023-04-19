<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'My Yii Application';

?>
<div class="site-index">
    <div class="p-5 mb-4 bg-transparent rounded-3">

    </div>

    <div class="body-content">

        <div class="post-index">

            <h1><?= Yii::t('app','Список статей')?></h1>

            <?php foreach ($articles as $article) { ?>
                <div class="content">
                    <h3><?= $article->name ?></h3>
                    <h4><?= $article->article ?> </h4>
                </div>

            <?php } ?>

        </div>

    </div>
</div>
