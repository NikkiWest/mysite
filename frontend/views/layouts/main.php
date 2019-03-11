<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="navbar-main navbarTop  ">
    <div class="container ">
        <div class="d-flex justify-content-between align-items-center">
            <div class=" col-md-3 col-sm-4 col-7 pt-1 pb-2">
                <a href="/"><img src="/img/logo.png" alt="Логотип" class="w-100"></a>
            </div>
            <div class="">
                <div class="d-block d-lg-none curpointer" data-toggle="modal" data-target="#modalMainMenu">
                    <i class="fas fa-bars icon_menu"></i>
                </div>
                <div class="d-none d-lg-block" id="menu">
                    <a class="btn-link btnHeader" href="/#service">Услуги</a>
                    <a class="btn-link btnHeader" href="/#portfolio">Портфолио</a>
                    <a class="btn-link btnHeader" href="/#feedback">Отзывы</a>
                    <a class="btn-link btnHeader" href="/#myself">О нас</a>
                    <a class="btn-link btnHeader" href="/#contacts">Контакты</a>
                </div>
            </div>
            <div class="d-none d-sm-block">
                <div class="btn btn-orange" id="btn-ask_qustion">Задать вопрос</div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?php
    $breadcrumbs = $this->params['breadcrumbs'] ?? [];
    if (count($breadcrumbs) > 0) {
        echo '<ul class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';
        echo '<li class="breadcrumb-item" itemprop="itemListElement"  itemscope itemtype="http://schema.org/ListItem">
                    <a href="/" itemprop="item"><span itemprop="name">Главная</span></a>
                    <meta itemprop="position" content="1" />
            </li>';
        $i = 1;
        foreach ($breadcrumbs as $item) {
            $i++;
            $url = $item['url'] ?? null;
            if ($url !== null) {
                echo '<li class="breadcrumb-item"  itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a href="' . $item['url'] . '" itemprop="item"><span itemprop="name">' . $item['label'] . '</span></a>
                            <meta itemprop="position" content="' . $i . '" />
                        </li>';
            } else {
                echo '<li class="active"> ' . $item . ' </li>';
            }
        }
        echo '</ul>';
    }
    ?>
</div>
<div class="mainContainer" style="padding-bottom: 0px; min-height: calc(100vh - 200px);">
<?php
if ($this->context->full_page !== true) echo '<div class="container">';

?>
<?php

if ($this->context->menu_left !== null) {
    echo '<div class="row position-relative">
<div class="leftMenuSm d-block d-lg-none curpointer mt-5" data-toggle="modal" data-target="#modalLeftMenu"> <i class="fas fa-bars icon_menu" style="color: #1a4071; "></i></div>
            <div class="col-lg-3 mt-5 d-none d-lg-block">' .
        \yii\widgets\Menu::widget([
            'options' => ['class' => 'leftMenuLg'],
            'items' => $this->context->menu_left,
        ])
        . '</div>
                <div class="col-lg-9">';
}
?>

<?= $content ?>

<?php
if ($this->context->menu_left !== null) {
    echo '</div></div>';
}
?>
<?php
if ($this->context->full_page !== true) echo '</div>';
?>



<?php
if ($this->context->menu_left !== null) {
    ?>
    <div class="modal fade" id="modalLeftMenu">
        <div class="modal-dialog" style="width: 98%; max-width: 800px">
            <div class="modal-content panel panel-red">
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="menuDialog">

                        <?php
                        foreach ($this->context->menu_left as $item) {

                            if(isset($item['items'])){
                                foreach ( $item['items'] as $sub_menu) {
                                    $active_sub = ($sub_menu['active'] == true) ? 'active' : '';
                                    echo '<div class="item menu_mobile mt-3 link '.$active_sub.'"><a href="' . $sub_menu['url'] . '">' . $sub_menu['label'] . '</a></div>';
                                }
                            }else{
                                $active = ($item['active'] == true) ? 'active' : '';
                                echo '<div class="item menu_mobile mt-3 link '.$active.'"><a href="' . $item['url'] . '">' . $item['label'] . '</a></div>';
                            }

                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

    <?php
    if($this->context->modal_order != null){
       echo $this->context->modal_order;
        ?>
    <?php
    }
    ?>
</div>
<div class="fonContact mt-5 " id="contacts">
    <div class="container  pt-5 text-white">
        <div class="row">
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-2"><a href="/" class="btn btn-footer">Готовое решение</a></div>
                        <div class="mb-2"><a href="/" class="btn btn-footer">Сайт-визитка</a></div>
                        <div class="mb-2"><a href="/" class="btn btn-footer">Корпоративный сайт</a></div>
                        <div class="mb-2"><a href="/" class="btn btn-footer">Интернет-магазин</a></div>
                        <div class="mb-2"><a href="/" class="btn btn-footer">Создание CRM</a></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-2"><a href="/" class="btn btn-footer">О нас</a></div>
                        <div class="mb-2"><a href="/" class="btn btn-footer">Портфолио</a></div>
                        <div class="mb-2"><a href="/" class="btn btn-footer">Услуги</a></div>
                        <div class="mb-2"><a href="/" class="btn btn-footer">Новости</a></div>
                        <div class="mb-2"><a href="/" class="btn btn-footer">Наши клиенты</a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 f16">
                <div class="font-weight-bold mb-2 ">Адрес:</div>
                <div class="mb-4">г. Новосибирск, Октябрьский район</div>
                <div class="font-weight-bold mb-2 ">Контакты:</div>
                <div class="d-flex mb-2 ">
                    <div><i class="fas fa-mobile-alt mr-3"></i></div>
                    <div class="d-flex d-flex flex-column">
                        <div>+7 (913) 787-99-68</div>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <div><i class="fas fa-envelope mr-3"></i></div>
                    <div><b>info@smartweb.pw</b></div>
                </div>
            </div>
        </div>
        <div class="row pad2">
            <div class="col-lg-5 col-sm-4  col-12 mb-2 mt-2 order-lg-2 f14 ">© 2019 ИП "Лодза Р.Е"</div>
            <div class="col-lg-7 col-sm-8  col-12 order-lg-1 f14  textPositionPrivacy  mb-2 mt-2 "><a
                        href="/img/pdf/privacy.pdf"
                        style="color: white!important; text-decoration: underline!important;" target="_blank">Политика
                    конфеденциальности</a>
                и
                <a href="/img/pdf/personal.pdf" target="_blank"
                   style="color: white!important;text-decoration: underline!important;">персональных
                    данных</a>

            </div>
        </div>


    </div>

</div>
<!-- Modal -->
<div class="modal fade" data-show="false" id="modalAskQuestion">
    <div class="modal-dialog" style="width: 95%; max-width: 500px;">
        <div class="modal-content panel panel-red">
            <div class="modal-header panel-heading">
                <h4 class="modal-title" id="title">Что-то интересует? Спросите!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <p class="text-center font-weight-bold">Задайте нам любой вопрос и мы с радостью вам перезвоним!</p>
                <form action="" id="form" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input value="" type="text" class="form-control" id="fio" name="fio"
                                   placeholder="Ф.И.О">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input value="" type="text" class="form-control" id="phone" name="phone"
                                   placeholder="8(913)999-99-99">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input value="" type="text" class="form-control" id="email" name="email"
                                   placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea type="text" class="form-control" id="txt" name="txt"
                                      placeholder="Вопрос"></textarea>
                        </div>
                    </div>

                    <input type="hidden" id="id" name="id"/>
                </form>
            </div>
            <div class="text-center mb-4">
                <button type="button" class="btn btn-blue" onclick="javascript:$('#form').submit(); return false;">
                    Задать вопрос
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMainMenu">
    <div class="modal-dialog" style="width: 98%; max-width: 800px">
        <div class="modal-content panel panel-red">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="menuDialog">
                    <div class="item link "><a class="btn-link btnHeader" href="#conference">О Конференции</a>
                    </div>
                    <div class="item mt-3 link"><a class="btn-link btnHeader" href="#programs">Программа</a>
                    </div>
                    <div class="item mt-3 link"><a class="btn-link btnHeader" href="#speakers">Спикеры</a></div>
                    <div class="item mt-3 link"><a class="btn-link btnHeader" href="#condition">Стоимость</a>
                    </div>
                    <div class="item mt-3 link"><a class="btn-link btnHeader" href="#contacts">Место
                            проведения</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div id="alertMessage"></div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

