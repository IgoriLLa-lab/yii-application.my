<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var Article $model */

use common\models\Article;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Написать статью!';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="create-article">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Напишите вашу статью и удивите весь мир!
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin();?>

            <?= $form->field($model, 'name')?>

            <?= $form->field($model, 'article')->textarea()?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>