<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 06.03.2019
 * Time: 13:57
 */

namespace frontend\modules\service\controllers;

use frontend\controllers\BaseController;

class DeveloperController extends BaseController
{
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionBusinessCard()
    {
        return $this->render('business-card');
    }

    public function actionReadyDecision()
    {
        return $this->render('ready-decision');
    }

    public function actionCorpSite()
    {
        return $this->render('corp-site');
    }

    public function actionShopSite()
    {
        return $this->render('shop-site');
    }
}