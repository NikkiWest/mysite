<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 06.03.2019
 * Time: 13:57
 */

namespace frontend\modules\service\controllers;

use frontend\controllers\BaseController;

class ReworkController extends BaseController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

}