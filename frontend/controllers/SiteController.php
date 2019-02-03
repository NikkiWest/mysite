<?php
namespace frontend\controllers;

use common\Core;
use common\models\Code;
use common\models\Invoice;
use common\models\Rekvizit;
use common\models\Users;
use frontend\models\FormInvoice;
use frontend\models\FormMail;
use frontend\models\FormPay;
use frontend\models\User;
use yii\web\Controller;
use common\models\LoginForm;

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
     * @return mixed
     */
    public function actionIndex()
    {
        $act = $_GET['act'] ?? null;

        $Rekvizit = new Rekvizit();
        $Invoice = new Invoice();
        $FormInvoice = new FormInvoice();
        $Users = new Users();

        $Rekvizit->id = $FormInvoice->_retLastRekvizitId();
        if ($Rekvizit->id > 0) $Rekvizit->get();

        $Invoice->id = $FormInvoice->_retLastInvoiceId();
        if ($Invoice->id > 0) $Invoice->get();

        $Users->id = \Yii::$app->user->id ?? null;
        $Users->get();

        //Core::dump(\Yii::$app->user->id);die;
        $this->layout = 'null';
        $this->view->registerJsFile('/js/main.js?v'.YII_V, ['depends'=>[\frontend\assets\AppAsset::className()]]);
        return $this->render('index', [
            'Users' =>$Users,
            'Rekvizit' =>$Rekvizit,
            'Invoice' =>$Invoice,
            'act' =>$act,
        ]);
    }

    public function actionRegistration()
    {
        $Users = new Users();
        $Users->attributes = $_POST;
        $Users->save();


        Core::error($Users);
        $ar = [];
        if (Core::hasError()===false) {
            $ar['success_txt'] = 'Вы успешно зарегистрированы';
            $Users->get();
            $User = new User();
            $User->email = $Users->email;
            $User->pw = $Users->pw;
            $User->login();

            if ($Users->flag_oplata_1 == 1) {
                $FormMail = new FormMail();
                $FormMail->sendConf($Users);
            }
        }
        Core::encode_echo($ar);
    }

    public function actionGetCost()
    {
        $code = $_POST['code'] ?? null;
        $FormPay = new FormPay();
        $ar['cost'] = (int) $FormPay->getCostByCode($code);

        if ($ar['cost'] == 0) {
            $user_id = \Yii::$app->user->id ?? null;
            if ($user_id > 0) {
                $FormPay->saveCode($code, $user_id);
            }
        }

        Core::encode_echo($ar);

    }

    public function actionTestOplata()
    {
        $Users = new Users();
        $Users->id = 1;
        $Users->get();

        $FormMail = new FormMail();
        $FormMail->sendConf($Users);
    }
}
