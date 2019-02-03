<?php
/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 10.08.2018
 * Time: 12:06
 */

namespace backend\controllers;


use yii\web\Controller;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        $user_id = \Yii::$app->user->id ?? null;
        if($user_id == null) {
            $this->redirect('/admin/site/login');
        }
        return parent::beforeAction($action);
    }

}