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


    public function actionView($slug)
    {
        $this->layout = 'main';
        $Portfolio = new Portfolio();
        $id = $Portfolio->getIdForSlug($slug);
        $lst = '';
        if($id !== null){
         $lst = $Portfolio->getPortfolioOne($id);
        }
        return $this->render('view',
            [
                'lst' => $lst
            ]);
    }
}