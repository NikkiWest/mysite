<?php

namespace backend\controllers;

use common\Core;
use common\models\Users;
use frontend\models\FormMail;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\User;

/**
 * Site controller
 */
class UsersController extends BaseController
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $user = new Users();
        $config = $_GET;
        $provider = $user->search($config);

        return $this->render('index',
            ['provider' => $provider,
                'cntAll'=>$user->cntAll(),]
        );
    }



    public function actionSetOplata()
    {
        $User = new Users();
        $User->id = $_POST['user_id'] ?? null;
        $User->setOplata();

        Core::error($User);
        $ar = [];
        if (Core::hasError() === false) {
            $User->get();
            $FormMail = new FormMail();
            $FormMail->sendConf($User);
            $ar['success_txt'] = "Оплата прошла успешно";
        }
        Core::encode_echo($ar);
    }
}
