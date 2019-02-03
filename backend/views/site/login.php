<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <form id="formLogin" method="post">
                    <div>
                        <input type="text" name="email" value="">
                    </div>

                <div>
                    <input type="password" name="pw" value="">
                </div>

                <div>
                    <button type="button" class="btn btn-primary" onclick="javascript:$('#formLogin').submit(); return false;">Войти</button>
                </div>
                <input type="hidden" name="act" value="login">
            </form>

        </div>
    </div>
</div>

<?php
$script = <<< JS
$(document).on("submit", "#formLogin", function (e) {
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
        data: data,
        url: "/admin/site/login",
        success: function (data) {
            if (response_msg(data) === false) return;
            location.href = "/admin/users";
        }
    });
    return false;
});
JS;
$this->registerJs($script, yii\web\View::POS_END);
?>
