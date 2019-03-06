<?php
namespace frontend\controllers;

use common\Core;
use common\models\Code;
use common\models\Invoice;
use common\models\Portfolio;
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
class SiteController extends BaseController
{

    public function actionIndex()
    {
        $this->full_page = true;
        $this->layout = 'null';
        $Portfolio = new Portfolio();
        $lst = $Portfolio->lst();
        $type = $Portfolio->getType();
        return $this->render('index',
            [
                'lst' =>$lst,
                'type' => $type
            ]
        );
    }



}
