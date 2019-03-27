<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 15.03.2019
 * Time: 17:54
 */

$this->title = "Список выполненных работ | Веб-студия Smartweb";
$this->params['breadcrumbs'] = ['Портфолио'];
$this->registerJs("PortfolioCtrl.actionIndex();", \yii\web\View::POS_END, 'actionIndex');
$this->registerMetaTag(['name' => 'decsription', 'content' => 'Портфолио созданных сайтов Новосибирской веб-студии Smartweb: от одностраничного сайта и landing page до корпоративных сайтов и CRM.']);
?>
<div class="title  mb-3">Портфолио реализованных решений</div>

    <div class="block_information  ">
        <div class="row">
            <div class="col-lg-1  col-sm-2 d-none d-sm-block"><img src="/img/portfolio/lamp.png" class="w-100" alt="SmartWeb"></div>
            <div class="col-lg-11  col-sm-10 col-12"> Наши решения - это наша гордость. <br> К разработке сайта под заказ или к созданию CRM мы подходим со всей
                ответственностью,<br>
                соблюдаем назначенные сроки и радуем вас выгодными предложениями!
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
                        <p><?php
                            //                            \common\Core::dump(mb_strlen($item['txt']));
                            $text = $item['txt'];
                            if (mb_strlen($item['txt']) >= 200) {
                                $string = substr($text, 0, 200);
                                $string = substr($string, 0, strrpos($string, ' '));
                                echo $string . " […] ";
                            }

                            ?></p>
                        <a href="/portfolio/view/<?= $item['seo_url']; ?>">Подробнее</a>
                    </figcaption>
                </figure>
                <?php
            }
        }
        ?>
    </div>
</div>
