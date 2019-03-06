<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 06.03.2019
 * Time: 13:58
 */

namespace frontend\controllers;


use yii\web\Controller;

class BaseController extends Controller
{

    public $full_page = false;


    /**
     * @var Меню слева
     */
    public $menu_left;

}