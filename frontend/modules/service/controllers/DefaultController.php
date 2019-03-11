<?php

namespace frontend\modules\service\controllers;

use common\Core;
use common\models\Order;
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
    public function actionSaveOrder()
    {
        $Order = new Order();
        $Order->attributes = $_POST ?? null;
        $Order->save();
        Core::error($Order);
        $ar = [];
        if(Core::hasError() === false) $ar['success_txt'] = 'Заявка успешно оставлена';
        Core::encode_echo($ar);
    }
}
