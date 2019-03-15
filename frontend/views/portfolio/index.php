<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 15.03.2019
 * Time: 17:54
 */

$this->title = "Список выполненных работ";
$this->params['breadcrumbs'] = ['Портфолио'];
$this->registerJs("PortfolioCtrl.actionIndex();", \yii\web\View::POS_END, 'actionIndex');
?>
<?php

?>
<div class="title  mb-5">Портфолио созданных сайтов</div>
<div class="mt-4 mb-4">
    <div class="d-none d-md-block">
        <div class="d-flex justify-content-start">
            <div class="col-auto selectType mr-3" data-t="0">
                Все
            </div>
            <?php
            foreach ($type as $item) {
                ?>
                <div class="col-auto selectType mr-3" data-t="<?= $item['id']; ?>">
                    <?= $item['name']; ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="d-block d-md-none ">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="mb-3 selectType mr-3" data-t="0">
                Все
            </div>
            <?php
            foreach ($type as $item) {
                ?>
                <div class="mb-3 selectType mr-3" data-t="<?= $item['id']; ?>">
                    <?= $item['name']; ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="grid">
        <?php
        foreach ($lst as $item) {
//                \common\Core::dump($item);
            $img = "/img/work/small/" . $item['id'] . ".jpg";
            ?>
            <figure class="effect-oscar lstSite" data-t="<?= $item['type_id']; ?>">
                <img src="<?= $img; ?>" alt="img08"/>
                <figcaption>
                    <h2><?= $item['name']; ?></h2>
                    <p><?= $item['txt']; ?></p>
                    <a href="/portfolio/view/<?= $item['seo_url']; ?>">Подробнее</a>
                </figcaption>
            </figure>
            <?php
        }
        ?>
    </div>
</div>
