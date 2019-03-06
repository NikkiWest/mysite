<?php

namespace frontend\modules\service;

/**
 * service module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\service\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }

    public function beforeAction($action)
    {
        $action->controller->menu_left = require(__DIR__ . '/menu.php');
        $action->controller->view->registerCssFile('/css/service.css?v' . YII_V, ['depends' => \frontend\assets\AppAsset::className()]);
        return parent::beforeAction($action);
    }
}
