<?php
namespace backend\controllers;

use backend\models\AdminUser;
use common\Core;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            $this->redirect('/users');
        }

        $act = $_POST['act'] ?? null;
        if ($act == 'login') {
            $model = new AdminUser();
            $model->email = $_POST['email'] ?? null;
            $model->pw = $_POST['pw'] ?? null;
            $model->login();


            Core::error($model);

            $ar = [];
            if (Core::hasError()===false) $ar['success_txt'] = 'Авторизация успешна';
            Core::encode_echo($ar);
        }

        return $this->render('login', [

        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
