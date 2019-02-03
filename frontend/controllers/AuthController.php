<?php
namespace frontend\controllers;

use common\Core;
use common\models\Users;
use frontend\models\User;
use yii\web\Controller;
use common\models\LoginForm;

/**
 * Site controller
 */
class AuthController extends Controller
{

    public function actionLogin()
    {
        $User = new User();
        $User->attributes = $_POST;
        $ar['user'] = $User->login();
        Core::error($User);
        return Core::encode_echo($ar);
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();
        $this->redirect("/");
    }
}
