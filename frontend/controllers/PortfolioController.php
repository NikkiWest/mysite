<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 27.02.2019
 * Time: 14:39
 */

namespace frontend\controllers;


use common\Core;
use common\models\Order;
use common\models\Portfolio;
use yii\web\Controller;

class PortfolioController extends BaseController
{

    public function init()
    {
        $this->view->registerCssFile('/css/portfolio.css?v' . YII_V, ['depends' => \frontend\assets\AppAsset::className()]);
        $this->view->registerJsFile('/js/portfolio.js?v' . YII_V, ['depends' => [\frontend\assets\AppAsset::class]]);
        parent::init();
    }

    public function actionIndex()
    {
        $Portfolio = new Portfolio();
        $lst = $Portfolio->lst();
        $type = $Portfolio->getType();
        return $this->render('index',
            [
                'lst' => $lst,
                'type' => $type
            ]
        );
    }

    public function actionView($slug)
    {
        $this->layout = 'main';
        $this->full_page = true;
        $Portfolio = new Portfolio();
        $id = $Portfolio->getIdForSlug($slug);
        $lst = [];
        if($id !== null){
         $lst = $Portfolio->getPortfolioOne($id);
        }
        return $this->render('view',
            [
                'lst' => $lst
            ]);
    }

    public function actionOrder()
    {
        $Order = new Order();
        $Order->attributes = $_POST ?? null;
        $Order->save();
        Core::error($Order);
        $ar = [];
        if(Core::hasError() === false) $ar['success_txt'] = 'Заявка успешно отправлена!';
        Core::encode_echo($ar);
    }
}