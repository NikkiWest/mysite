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
$this->registerMetaTag(['name' => '', 'content' => '']);
?>
<div class="title  mb-3">Портфолио реализованных решений</div>
<div class="text-center">
    <div class="block_site_good  mb-5">
        <div> Наши решения - это наша гордость. <br> К разработке сайта под заказ или к созданию CRM мы подходим со всей
            ответственностью,<br>
            соблюдаем назнаенные сроки и радуем вас выгодными предложениями!
        </div>

    </div>
</div>

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
            foreach ($item['types'] as $type) {
//                \common\Core::dump($item);
                $img = "/img/work/small/" . $item['id'] . ".png";
                ?>
                <figure class="effect-oscar lstSite" data-t="<?= $type['id_type'];; ?>">
                    <img src="<?= $img; ?>" alt="<?= $item['name']; ?>"/>
                    <figcaption>
                        <h2><?= $item['name']; ?></h2>
                        <p><?= $item['txt']; ?></p>
                        <a href="/portfolio/view/<?= $item['seo_url']; ?>">Подробнее</a>
                    </figcaption>
                </figure>
                <?php
            }
        }
        ?>
    </div>
</div>
