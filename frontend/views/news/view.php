<?php

/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 29.03.2019
 * Time: 16:49
 */

/* @var $this \yii\web\View */
/* @model $this common/models/News */


$this->title = "Список новостей | Веб-студия Smartweb";
$this->params['breadcrumbs'] = [
    [
        'label' => 'Новости',
        'url' => '/news'
    ], $model->name
];
$this->registerJs("NewsCtrl.actionIndex();", \yii\web\View::POS_END, 'actionIndex');
$this->registerMetaTag(['name' => 'decsription', 'content' => 'Новости Новосибирской веб-студии Smartweb']);
?>
    <div class="block_image" style="background-image: url('/img/news/<?= $model->id; ?>.jpg')"></div>
    <div class="title mt-5 mb-5"><?= $model->name; ?></div>
    <div class="">
        <?=$model->desc_full;?>
    </div>

<?php
//\common\Core::dump($model);
