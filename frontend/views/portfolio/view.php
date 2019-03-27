<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 27.02.2019
 * Time: 14:38
 */


if($lst['type_id'] == 5){
    $type_site = 'CRM';
    $type_site_rod = "CRM разработанная";
}else{
    $type_site = 'сайта';
    $type_site_rod = 'Сайт разработанный';
}
$this->title = "Создание $type_site - " . $lst['name']. " | Веб-студия Smartweb";
$this->params['breadcrumbs'] = [
    [
        'label' => 'портфолио',
        'url' => '/portfolio',
    ], $lst['name']
];
$this->registerJs("PortfolioCtrl.actionView();", \yii\web\View::POS_END, 'actionView');
$this->params['breadcrumbs'] = null;

$img = "/img/work/full/{$lst['id']}.png";
$this->registerMetaTag(['name' => 'decsription',
    'content' => $type_site_rod.'  Новосибирской веб-студией Smartweb для '.$lst['name']])
//\common\Core::dump($lst);
?>
    <div class="banner d-flex align-items-center justify-content-center">
        <h1 class="title__banner"><?= $lst['name']; ?></h1>
    </div>

    <div class="container">
        <?php
        $breadcrumbs = [];
        $t['label'] = 'Портфолио';
        $t['url'] = '/portfolio';
        $breadcrumbs[] = $t;

        $t['label'] = $lst['name'];
        $t['url'] = '';
        $breadcrumbs[] = $t;


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

    <div class="container">
        <div class="row  mb-4">
            <div class="col-sm-7 mt-3">
                <a data-toggle="lightbox" data-gallery="gallery" href="<?= $img; ?>">
                    <img class="w-100" src="<?= $img; ?>" alt="<?= $lst['name']; ?>">
                </a>
            </div>
            <div class="col-sm-5 mt-3 d-flex flex-column justify-content-between">
                <div class="info_block">
                    <div class="row mb-3">
                        <div class="col-sm-6 title_block">адрес сайта</div>
                        <div class="col-sm-6 url_site"><a href="<?= $lst['url']; ?>"
                                                          target="_blank"><?= $lst['url']; ?></a></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6 title_block">Категория</div>
                        <div class="col-sm-6 type_site"><?= $lst['type_name']; ?></div>
                    </div>
                    <div class="d-flex flex-column mb-3">
                        <div class=" title_block mb-3">Задачи</div>
                        <div class="c task_site"><?= $lst['task']; ?></div>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="title_block mb-3">Описание</div>
                        <div class="desc_site"><?= $lst['txt']; ?></div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="block_site_good mt-3">
                        <div>
                            <div class="title__site_good">Хотите такой же сайт или еще лучше?</div>
                            <div class="btn btn-orange mt-3 mb-3" id="btnOrder">Заказать</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 mb-5">
            <div class="title_blue  mb-5"> Другие выполненные работы</div>
            <div class="">  <?=\frontend\widgets\PortfolioWidget::widget();?></div>

        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalOrder">
        <div class="modal-dialog" style="width: 95%; max-width: 500px;">
            <div class="modal-content panel panel-red">
                <div class="modal-header panel-heading">
                    <h4 class="modal-title" id="title">Заявка на создание сайта </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">
                    <p class="text-center  font-weight-bold">Заполните контактные данные
                        и в течение дня мы свяжемся с вами для уточнения вопроса по вашему бизнесу!</p>
                    <form action="" id="formOrder" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input value="" type="text" class="form-control" id="fio" name="fio"
                                       placeholder="Ф.И.О.">
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
                                <textarea type="text" class="form-control" id="comment" name="comment"
                                          placeholder="Комментарий"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="type" value="8">
                    </form>
                </div>
                <div class="text-center mb-4">
                    <button type="button" class="btn btn-blue"
                            onclick="javascript:$('#formOrder').submit(); return false;">Отправить заявку
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php
//\common\Core::dump($lst);