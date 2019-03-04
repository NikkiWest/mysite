<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 27.02.2019
 * Time: 14:39
 */

namespace frontend\controllers;


use common\models\Portfolio;
use yii\web\Controller;

class PortfolioController extends Controller
{

    public function init()
    {
        $this->view->registerCssFile('/css/portfolio.css?v' . YII_V, ['depends' => \frontend\assets\AppAsset::className()]);
        $this->view->registerJsFile('/js/portfolio.js?v' . YII_V, ['depends' => [\frontend\assets\AppAsset::class]]);
        parent::init();
    }

    public function actionView($slug)
    {
        $this->layout = 'main';
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
}