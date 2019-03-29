<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc_short')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc_full')->textarea(['class' => 'txtTinyMCE']) ?>
    <?= $form->field($model, 'seo_url')->textInput(['maxlength' => true]) ?>
     <?= $form->field($model, 'dt')->textInput(['class' => 'form-control dt']) ?>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
