<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'update',
    'options' => ['class' => 'form-horizontal'],
]) ?>
<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'email')?>

<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>

