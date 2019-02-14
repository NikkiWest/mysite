<?php
namespace frontend\controllers;

use common\Core;
use common\models\Code;
use common\models\Invoice;
use common\models\Users;
use frontend\models\FormBilet;
use frontend\models\FormInvoice;
use frontend\models\FormPay;
use frontend\models\User;
use kartik\mpdf\Pdf;
use yii\web\Controller;
use common\models\LoginForm;

/**
 * Site controller
 */
class CabinetController extends Controller
{
    public function beforeAction($action)
    {
        $user_id = \Yii::$app->user->id ?? null;

        if ($user_id == null) {
            $this->redirect('/');
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
