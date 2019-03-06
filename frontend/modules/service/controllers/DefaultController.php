<?php

namespace frontend\modules\service\controllers;

use frontend\controllers\BaseController;
use yii\web\Controller;

/**
 * Default controller for the `service` module
 */
class DefaultController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function actionIndex()
    {
        return $this->render('index');
    }
}
