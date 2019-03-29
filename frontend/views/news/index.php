<?php

/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 29.03.2019
 * Time: 12:43
 */

/* @var $this \yii\web\View */
/* @var $model \yii\web\View */
$this->title = "Список новостей | Веб-студия Smartweb";
$this->params['breadcrumbs'] = ['Новости'];
$this->registerJs("NewsCtrl.actionIndex();", \yii\web\View::POS_END, 'actionIndex');
$this->registerMetaTag(['name' => 'decsription', 'content' => 'Новости Новосибирской веб-студии Smartweb']);

?>
<div class="title  mb-5">Новости</div>
<div class="row">
    <?php
    foreach ($model as $item) {
//        \common\Core::dump($item->id);
        ?>
        <div class="col-lg-4 col-sm-6  col-12 mb-4 d-flex">
            <div class="block_news">
                <div style="height: 100%;width: 100%">
                    <div class="img__block_news">
                        <a href="/news/view/<?=$item->seo_url;?>"> <img src="/img/news/<?= $item->id; ?>.jpg" alt="<?= $item->name; ?>" class="w-100"></a>
                    </div>
                    <div class="title__block_news"><a href="/news/view/<?=$item->seo_url;?>"><?= $item->name; ?></a></div>
                    <div class="desc__block_news"><?= $item->desc_short; ?></div>
                    <div class="button_block_news"><a href="/news/view/<?= $item->seo_url; ?>" class="btn btn-orange">Читать</a></div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>