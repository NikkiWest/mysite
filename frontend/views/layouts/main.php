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
<div class="navbar-main navbarTop pb-4 pt-4" style="background-color: #9acfea">
    <div class="container ">
        <div class="row justify-content-between align-items-center">
            <div class="col-auto">
                <a href="/"> logo</a>
            </div>
            <div class="col-auto">
                <div class="d-block d-sm-none curpointer" data-toggle="modal" data-target="#modalMainMenu">
                    <i class="fas fa-bars" style="font-size: 40px;color: white"></i>
                </div>
                <div class="d-none d-sm-block" id="menu">
                    <a class="btn-link btnHeader" href="/#service">Услуги</a>
                    <a class="btn-link btnHeader" href="/#portfolio">Портфолио</a>
                    <a class="btn-link btnHeader" href="/#feedback">Отзывы</a>
                    <a class="btn-link btnHeader" href="/#myself">О нас</a>
                    <a class="btn-link btnHeader" href="/#contacts">Контакты</a>
                </div>
            </div>
            <div class="col-auto">
                <div class="btn btn-success">Задать вопрос</div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container">
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
</div>
<?= $content ?>
<?php
if (!YII_DEBUG) {
    ?>

    <?php
}
?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

