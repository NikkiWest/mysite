<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 29.03.2019
 * Time: 12:42
 */

namespace frontend\controllers;


use common\models\News;

class NewsController extends BaseController
{
    public function init()
    {
        $this->view->registerCssFile('/css/news.css?v' . YII_V, ['depends' => \frontend\assets\AppAsset::className()]);
        $this->view->registerJsFile('/js/news.js?v' . YII_V, ['depends' => [\frontend\assets\AppAsset::class]]);
        parent::init();
    }
        public function actionIndex()
        {
            $News = new News();
            $model = $News->find()->all();
            return $this->render('index',[
                'model' => $model
            ]);
        }

        public function actionView()
        {
            $slug = $_GET['slug'] ?? null;
            $News = new News();
            $model = $News->find()->where(['seo_url' => $slug])->one();
            return $this->render('view',[
                'model' =>$model
                ]);
        }
}