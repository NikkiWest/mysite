<?php

/* @var $this yii\web\View */

$this->title = 'Интернет-решения для бизнеса | Заказать сайт в Новосибирске | Веб-студия Smartweb';
$this->registerJs("MainCtrl.actionIndex();", \yii\web\View::POS_END, 'actionIndex');
$this->registerMetaTag(['name' => 'decsription', 'content' => 'Создание сайтов, разработка веб-приложений и CRM под ключ. Веб-студия в Новосибирске. Доступные цены от профессионалов своего дела.']);
$user_id = Yii::$app->user->id ?? null;

//\common\Core::dump($Users);

?>
<div class="fonTop">

    <div class="container">
        <div class="navbarTop">
            <div class="row justify-content-between align-items-center">
                <div class="col-8 col-lg-3 col-md-4 col-sm-4">
                    <div class="logo_border">
                        <a href="/"><img src="/img/logo.png" alt="Логотип" class="w-100"></a>
                    </div>
                </div>
                <div class="col-auto col-lg-9 col-md-8 col-sm-8 text-right">
                    <div class="d-block d-sm-none curpointer" data-toggle="modal" data-target="#modalMainMenu">
                        <i class="fas fa-bars icon_menu"></i>
                    </div>
                    <div class="d-none d-sm-block" id="menu">
                        <a class="btn-link btnHeader" href="#service">Услуги</a>
                        <a class="btn-link btnHeader" href="#portfolio">Портфолио</a>
                        <a class="btn-link btnHeader" href="#klients">Клиенты</a>
                        <a class="btn-link btnHeader" href="#myself">О нас</a>
                        <a class="btn-link btnHeader" href="#contacts">Контакты</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="d-flex align-items-center position-relative ">
            <div class="textBigBanner ">

                <h1 class="title_big_banner">Эффективные <br> интернет-решения <br>
                    для вашего бизнеса</h1>

                <div class="regBanner">
                    <div class="waitOffReg">Мы предлагаем различные решения: от сайта-визитки, до корпоративных
                        вэб-приложений и CRM-систем, которые сделают ваш бизнес эффективнее уже сегодня!
                    </div>

                </div>
                <div class="buttonBanner">
                    <div class="btn btn-reg openModalOrder">Подобрать эффективное решение</div>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="segment-white mb-5   " id="service">
    <div class="container pt-5">
        <h2 class="title_blue">Что мы можем предложить</h2>
        <div class="row mt-5 ">
            <div class="col-lg-3 col-md-6 mt-4">
                <div class="block_service">
                    <a href="/service/developer/index" target="_blank" class="header_service">
                        <div class="img_service">
                            <img src="/img/icons/create_site.svg" alt="Создание сайтов">
                        </div>
                        Разработка сайтов
                    </a>
                    <div class="cost_service">
                        от 3000 р
                    </div>
                    <div class="block_info">
                        <div class="info_service"><a href="/service/developer/business-card">Сайт - визитка</a></div>
                        <div class="info_service"><a href="/service/developer/ready-decision">Landing Page</a></div>
                        <div class="info_service"><a href="/service/developer/corp-site">Корпоративный сайт</a></div>
                        <div class="info_service"><a href="/service/developer/shop-site">Интернет-магазин</a></div>
                    </div>

                    <div class="button_service">
                        <a class=" btn " href="/service/developer/index" target="_blank">подробнее</a>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4">
                <div class="block_service">
                    <a href="/service/developer-web" target="_blank" class="header_service">
                        <div class="img_service">
                            <img src="/img/icons/create_web.svg" alt="Создание web-приложений">
                        </div>
                        Разработка web-приложений
                    </a>
                    <div class="cost_service">
                        от 10000 р
                    </div>
                    <div class="block_info">
                        <div class="info_service"><a href="/service/developer-web">Индивидуальная CRM</a></div>
                        <div class="info_service"><a href="/service/developer-web">Шаблонная CRM</a></div>
                        <div class="info_service"><a href="/service/developer-web">Доработка CRM</a></div>
                        <div class="info_service"><a href="/service/developer-web">Проектирование БД</a></div>
                    </div>

                    <div class="button_service">
                        <a class=" btn " href="/service/developer-web" target="_blank">подробнее</a>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4">
                <div class="block_service">
                    <a href="/service/rework" target="_blank" class="header_service">
                        <div class="img_service">
                            <img src="/img/icons/work_site.svg" alt=" Доработка сайтов">
                        </div>
                        Доработка сайтов
                    </a>
                    <div class="cost_service">
                        от 500 р
                    </div>
                    <div class="block_info">
                        <div class="info_service"><a href="/service/rework">Исправление ошибок</a></div>
                        <div class="info_service"><a href="/service/rework">Изменения в дизайне</a></div>
                        <div class="info_service"><a href="/service/rework">Новый функционал</a></div>
                        <div class="info_service"><a href="/service/rework">Внутрення оптимизация</a></div>
                    </div>

                    <div class="button_service">
                        <a class=" btn " href="/service/rework" target="_blank">подробнее</a>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-4">
                <div class="block_service">
                    <a href="/service/maintenance" target="_blank" class="header_service">
                        <div class="img_service">
                            <img src="/img/icons/help_site.svg" alt="Обслуживание сайтов">
                        </div>
                        Обслуживание сайтов
                    </a>
                    <div class="cost_service">
                        от 3000 р
                    </div>
                    <div class="block_info">
                        <div class="info_service"><a href="/service/maintenance">Контроль работоспособности сайта</a>
                        </div>
                        <div class="info_service"><a href="/service/maintenance">Оперативное устранение ошибок и
                                сбоев</a></div>
                        <div class="info_service"><a href="/service/maintenance">Восстановление при сбоях</a></div>
                    </div>

                    <!--                    <div class="info_service">доступно</div>-->
                    <div class="button_service" style="margin-top: 20px">
                        <a class=" btn " href="/service/maintenance" target="_blank">подробнее</a>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
<?php
/*
 * <div class="position-relative" id="programs">
    <div class="container pt-5">

        <div class="title_blue text-lg-left programma"> В каждый наш сайт входит</div>
        <div class="row mt-4">
            <div class=" col-lg-5 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-offset-2 col-md-10 col-sm-12 col-xs-12 col-sm-center col-xs-center">
                        <div class="row mt-5 align-items-center">
                            <div class=" col-lg-6 col-md-4 col-sm-4 col-xs-12 text-right col-sm-center col-xs-center">
                                <img alt="Кроссбраузерность" src="/img/preim/one_preim.svg" class="w-100"></div>
                            <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                                <div class="titlePreim">Адаптивность</div>
                                <div class="mt-3">Все наши сайты включают адаптацию на всех устройствах.</div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-10 col-sm-12 col-xs-12 col-sm-center col-xs-center">
                        <div class="row mt-5 align-items-center">
                            <div class="col-md-5 col-sm-5 col-xs-12 text-right col-sm-center col-xs-center"><img
                                        alt="Активная поддержка"
                                        src="/img/preim/two_preim.svg" class="w-100"></div>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="titlePreim">Активная поддержка</div>
                                <div class="mt-3">Помощь в составлении ТЗ, оформлении будущего сайта, рекомендации по
                                    доработкам
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-2 col-md-10 col-sm-12 col-xs-12 col-sm-center col-xs-center mb-5">
                        <div class="row mt-5 align-items-center">
                            <div class="col-md-5 col-sm-5 col-xs-12 text-right col-sm-center col-xs-center"><img
                                        alt="расширение функциональности" class="w-100"
                                        src="/img/preim/three_preim.svg"></div>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="titlePreim">Увеличение функциональности</div>
                                <div class="mt-3">Во всех нащих сайтах вы можете в дальнейшем что-то улучшить или
                                    доработать
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="img_preim" class="col-lg-7 col-md-12 ">
                <img class="" alt="Mac" src="/img/preim/bg_preim.png">
            </div>
        </div>

    </div>
</div>
 */
?>

<div class="block block4 advantages pt-5 pb-5 " id="programs">
    <div class="container ">
        <h2 class="title_white border_title mb-5 ">Что вы гарантированно получаете, работая с нами?</h2>
        <div class=" advantages-table ui-accordion ui-widget ui-helper-reset" role="tablist" id="accordion">
            <div class="item item-1">
                <div class="caption ui-accordion-header ui-state-default ui-accordion-icons  ui-corner-top
ui-accordion-header-active ui-state-active" role="tab" id="ui-id-1" aria-controls="ui-id-2" aria-selected="true"
                     aria-expanded="true" tabindex="0">
                    <div class="caption_text">
                        Анализ потребностей вашей компании
                    </div>
                </div>
                <div class="text ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-id-2"
                     aria-labelledby="ui-id-1" role="tabpanel" aria-hidden="false">
                    Для решения задач вашего бизнеса мы поможем вам проанализировать специфику вашей компании, рынка и
                    клиентов, и разработаем для вас наиболее подходящий продукт.
                </div>
            </div>
            <div class="item item-2" data-id="2">
                <div class="caption ui-accordion-header ui-state-default ui-accordion-icons ui-corner-all" role="tab"
                     id="ui-id-3" aria-controls="ui-id-4" aria-selected="false" aria-expanded="false" tabindex="-1">
                    <div class="caption_text">
                        Объективные коммерческие предложения
                    </div>
                </div>
                <div class="text ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-id-4"
                     aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true">
                    Заказывая решения в нашей компании, вы можете быть уверены в том, что оно будет содержать только то,
                    что необходимо вашему бизнесу без лишнего функционала и бессмысленных денежных затрат
                </div>
            </div>
            <div class="item item-3" data-id="3">
                <div class="caption ui-accordion-header ui-state-default ui-accordion-icons ui-corner-all" role="tab"
                     id="ui-id-5" aria-controls="ui-id-6" aria-selected="false" aria-expanded="false" tabindex="-1">
                    <div class="caption_text">
                        Эффективно работающее решение
                    </div>
                </div>
                <div class="text ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-id-6"
                     aria-labelledby="ui-id-5" role="tabpanel" aria-hidden="true"
                ">
                Каждое наше решение отличает высокая эффективность выполнения задач клиента, стабильность работы и
                качественное исполнение.
            </div>
        </div>
        <div class="item item-4">
            <div class="caption ui-accordion-header ui-state-default ui-accordion-icons ui-corner-all" role="tab"
                 id="ui-id-7" aria-controls="ui-id-8" aria-selected="false" aria-expanded="false" tabindex="-1">
                <div class="caption_text">
                    Консультации у лучших в своем деле
                </div>
            </div>
            <div class="text ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-id-8"
                 aria-labelledby="ui-id-7" role="tabpanel" aria-hidden="true">
                Порой трудно понять какое решение будет эффективно для вашего бизнеса в определенный момент.
                Наша опытная команда всегда готова проконсультировать вас по всем возникающим вопросам.
            </div>
        </div>
    </div>
</div>
</div>


<?php

/*
 *
 * <div class="colorStatictic ">
    <div class="d-none d-md-block">
        <div class="d-flex justify-content-center align-items-center ">
            <div class="border_Conf"><span class="fatLetter">16</span> <br> успешных проектов</div>
            <div class="border_Conf"><span class="fatLetter">2</span> <br> года в IT индустрии</div>
            <div class="border_Conf"><span class="fatLetter">20</span><br> </div>
            <div class="border_Conf"><span class="fatLetter">5</span> <br>кейсов</div>
        </div>
    </div>
    <div class="d-block d-md-none">
        <div class="d-flex justify-content-center mt-3 mb-3">
            <div class=" border_Conf mr-2"><span class="fatLetter">1</span> <br> день</div>
            <div class=" border_Conf  mr-2"><span class="fatLetter">200</span> <br> участников</div>
        </div>
        <div class="d-flex justify-content-center">
            <div class=" border_Conf  mr-2"><span class="fatLetter">15</span><br> спикеров</div>
            <div class="border_Conf  mr-2"><span class="fatLetter">6</span> <br>часов</div>
        </div>
    </div>
</div>
 */
?>


<div class="segment-white mb-4  " id="portfolio">
    <div class="container pt-5">
        <h2 class="title_blue  mb-5">Портфолио наших решений</h2>
        <div class="d-none d-md-block">
            <div class="d-flex justify-content-center">
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
        <div class=" grid">
            <?php
            foreach ($lst as $item) {
//                \common\Core::dump($item);
                $img = "/img/work/small/" . $item['id'] . ".png";

                    ?>
                    <figure class="effect-oscar lstSite " data-t="<?= $type['id']; ?>">
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
            ?>
        </div>
    </div>
</div>


<div class="container pt-5 mb-4" id="klients">
    <h2 class="title_blue  mb-5"> Наши клиенты</h2>
    <div class="row text-center mb-3">
        <div class="owl-carousel owl-theme  logo_img">
            <a
                    class="col-lg-3 col-sm-6 col-md-6 mt-3">
                <img class="w-100" src="/img/pathers/2x2.png" alt="Партнер 1">
            </a>
            <a
                    class="col-lg-3 col-sm-6 col-md-6 mt-3">
                <img class="w-100" src="/img/pathers/homemag.png" alt="Партнер 2">
            </a>
            <a
                    class="col-lg-3 col-sm-6 col-md-6 mt-3">
                <img class="w-100" src="/img/pathers/medznanie.png" alt="Партнер 3">
            </a>
            <a
                    class="col-lg-3 col-sm-6 col-md-6 mt-3">
                <img class="w-100" src="/img/pathers/micasa.png" alt="Партнер 4">
            </a>
            <a
                    class="col-lg-3 col-sm-6 col-md-6 mt-3">
                <img class="w-100" src="/img/pathers/viet.png" alt="Партнер 5">
            </a>
            <a
                    class="col-lg-3 col-sm-6 col-md-6 mt-3">
                <img class="w-100" src="/img/pathers/promining.png" alt="Партнер 6">
            </a>

            <a
                    class="col-lg-3 col-sm-6 col-md-6 mt-3">
                <img class="w-100" src="/img/pathers/kalite.png" alt="Партнер 7">
            </a>
            <a
                    class="col-lg-3 col-sm-6 col-md-6 mt-3">
                <img class="w-100" src="/img/pathers/proffesional.png" alt="Партнер 8">
            </a>
            <a
                    class="col-lg-3 col-sm-6 col-md-6 mt-3">
                <img class="w-100" src="/img/pathers/conf.png" alt="Партнер 9">
            </a>

            <a
                    class="col-lg-3 col-sm-6 col-md-6 mt-3">
                <img class="w-100" src="/img/pathers/Mir-vkusa.png" alt="Партнер 10">
            </a>

        </div>
    </div>
</div>

<div class="somneniya fon-for-order">
    <div class="container pt-5 pb-5">
        <h2 class="title_white mb-5"> Остались сомнения?</h2>
        <div class="mt-4 mb-5 text-somneniya">
            Отправьте заявку уже сегодня и вам в качестве бонуса
            будет скидка 10% на услуги
        </div>
        <div id="formOrder-block">
            <div class="d-flex justify-content-center">
                <div class="smart_offer position-relative mt-4">

                    <div class="img_skidka">
                        <img src="/img/skidka.png" class="w-100" alt="Скидка за заявку"></div>
                    <form action="" class="formReg " id="formOrderMain" data-t="block">
                        <div class="row form-group ">
                            <div class="col-sm-12 ">
                                <input type="text" class="form-control" id="formOrderMain-fio" name="fio"
                                       placeholder="Как вас зовут?" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row form-group ">
                            <div class="col-sm-12 ">
                                <input type="email" class="form-control" id="formOrderMain-email" name="email"
                                       placeholder="E-mail" autocomplete="off">
                            </div>
                        </div>
                        <div class="row form-group ">
                            <div class="col-sm-12 ">
                                <input type="text" class="form-control" id="formOrderMain-phone" name="phone"
                                       placeholder="Телефон" autocomplete="off">
                            </div>
                        </div>
                        <div class="row form-group ">
                            <div class="col-sm-12 ">
                                <textarea type="text" class="form-control" id="formOrderMain-comment"
                                          name="comment"
                                          placeholder="Комментарий (по желанию)" autocomplete="off"></textarea>
                            </div>
                        </div>
                        <div class="row form-group pb-3">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-reg "
                                        onclick="javascript:$('#formOrderMain').submit(); return false;">Хочу скидку!
                                </button>
                            </div>
                            <div class="col-sm-12 mt-4 text-center f10 text-white">Нажимая кнопку
                                «Хочу скидку!», Вы разрешаете нам обработку Ваших <a href="/img/pdf/privacy.pdf"
                                                                                     target="_blank">персональных
                                    данных</a></div>
                        </div>
                    </form>

                </div>


            </div>
        </div>
        <div id="FormOk" style="display: none">
            <div class="d-flex align-items-center">
                <div class="round-ok mr-3"><i class="fas fa-thumbs-up  f28"></i></div>
                <div>
                    Спасибо за вашу заявку! <br>
                    В ближайщее время с вами свяжется наш менеджер для уточнения информации
                    по вашему проекту.
                </div>
            </div>

        </div>
    </div>
</div>

<div class="company  mb-5" id="myself">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 mt-5">
                <h2 class="title_blue   mb-5"> О нас</h2>
                <div><b>SmartWeb</b> – это компания с атмосферой стартапа, для которой эффективность разрабатываемых
                    решений
                    важнее всего. Наша международная команда профессионалов уже 3 года создает продукты, которые помогли
                    десяткам компаний более продуктивнее. Работая с нами, вы получаете лучшее решение!
                </div>
            </div>
            <div class="col-md-6 col-sm-12 mt-5">
                <div class="title_blue   mb-5"> Новости</div>
                        <?php
                        foreach ($news as $new) {
//                            \common\Core::dump($new['dt']);
                            ?>
                            <div class="row align-items-center mb-4">
                                <div class="col-md-2">
                                    <div class="date_news">
                                        <?= date("d.m", strtotime($new['dt'])); ?>
                                    </div>
                                </div>
                                <div class="col-md-10"><a class="link_news" href="/news/view/<?=$new['seo_url'];?>"><?=$new['name'];?></a></div>
                            </div>
                            <?php
                        }
                        ?>
            </div>
        </div>
    </div>
</div>


<div class="fonContact " id="contacts">
    <div class="container  pt-5 text-white">
        <div class="row">
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-2"><a href="/service/developer/ready-decision" class="btn btn-footer">Готовое
                                решение</a></div>
                        <div class="mb-2"><a href="/service/developer/business-card"
                                             class="btn btn-footer">Сайт-визитка</a></div>
                        <div class="mb-2"><a href="/service/developer/corp-site" class="btn btn-footer">Корпоративный
                                сайт</a></div>
                        <div class="mb-2"><a href="/service/developer/shop-site"
                                             class="btn btn-footer">Интернет-магазин</a></div>
                        <div class="mb-2"><a href="/service/developer-web" class="btn btn-footer">Создание CRM</a></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-2"><a href="/#myself" class="btn btn-footer">О нас</a></div>
                        <div class="mb-2"><a href="/#portfolio" class="btn btn-footer">Портфолио</a></div>
                        <div class="mb-2"><a href="/#service" class="btn btn-footer">Услуги</a></div>
                        <div class="mb-2"><a href="/#myself" class="btn btn-footer">Новости</a></div>
                        <div class="mb-2"><a href="/#klients" class="btn btn-footer">Наши клиенты</a></div>
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


<!--Модалка в меню в гамбургере-->
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
                    <div class="item link "><a class="btn-link btnHeader" href="#service">Услуги</a>
                    </div>
                    <div class="item mt-3 link"><a class="btn-link btnHeader" href="#portfolio">Портфолио</a>
                    </div>
                    <div class="item mt-3 link"><a class="btn-link btnHeader" href="#feedback">Отзывы</a></div>
                    <div class="item mt-3 link"><a class="btn-link btnHeader" href="#myself">О нас</a>
                    </div>
                    <div class="item mt-3 link"><a class="btn-link btnHeader" href="#contacts">Контакты</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" data-show="false" id="modalOrder">
    <div class="modal-dialog" style="width: 95%; max-width: 500px;">
        <div class="modal-content panel panel-red">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Оставьте заявку уже СЕЙЧАС и получите скидку 10% на наши услуги</p>
                <form action="" class="formReg " id="formOrder" data-t="banner">
                    <div class="row form-group ">
                        <div class="col-sm-12 ">
                            <input type="text" class="form-control" id="formOrder-fio" name="fio"
                                   placeholder="Как вас зовут?" autocomplete="new-password">
                        </div>
                    </div>
                    <div class="row form-group ">
                        <div class="col-sm-12 ">
                            <input type="email" class="form-control" id="formOrder-email" name="email"
                                   placeholder="E-mail" autocomplete="off">
                        </div>
                    </div>
                    <div class="row form-group ">
                        <div class="col-sm-12 ">
                            <input type="text" class="form-control" id="formOrder-phone" name="phone"
                                   placeholder="Телефон" autocomplete="off">
                        </div>
                    </div>
                    <div class="row form-group ">
                        <div class="col-sm-12 ">
                                <textarea type="text" class="form-control" id="formOrder-comment"
                                          name="comment"
                                          placeholder="Комментарий (по желанию)" autocomplete="off"></textarea>
                        </div>
                    </div>
                    <div class="row form-group pb-3">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-reg "
                                    onclick="javascript:$('#formOrder').submit(); return false;">Хочу скидку!
                            </button>
                        </div>
                        <div class="col-sm-12 mt-4 text-center f10">Нажимая кнопку
                            «Хочу скидку!», Вы разрешаете нам обработку Ваших <a href="/img/pdf/privacy.pdf"
                                                                                 target="_blank">персональных
                                данных</a></div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
