<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 27.02.2019
 * Time: 14:38
 */

$this->title = "Портфолио - сайт " . $lst['name'];
$this->params['breadcrumbs'] = [
    [
        'label' => 'портфолио',
        'url' => '/portfolio',
    ], $lst['name']
];
?>
    <div class="banner d-flex align-items-center justify-content-center">
        <div class="title__banner"><?= $lst['name']; ?></div>
    </div>

    <div class="container">
        <div class=row">
            <div class="col-sm-7">
                <img src="" alt="">
            </div>
            <div class="col-sm-5">
                <div class="info_block">
                    <div class=" row">
                        <div class="col-sm-6 title_block">адрес сайта</div>
                        <div class="col-sm-6 url_site"><?= $lst['url']; ?></div>
                    </div>
                    <div class=" row">
                        <div class="col-sm-6 title_block">адрес сайта</div>
                        <div class="col-sm-6 url_site"><?= $lst['url']; ?></div>
                    </div>
                    <div class=" row">
                        <div class="col-sm-6 title_block">адрес сайта</div>
                        <div class="col-sm-6 url_site"><?= $lst['url']; ?></div>
                    </div>
                    <div class=" row">
                        <div class="col-sm-6 title_block">адрес сайта</div>
                        <div class="col-sm-6 url_site"><?= $lst['url']; ?></div>
                    </div>
                    <div class="type_site"><?= $lst['type_name']; ?></div>
                    <div class="task_site"><?= $lst['task']; ?></div>
                    <div class="desc_site"><?= $lst['txt']; ?></div>
                </div>
            </div>
        </div>
    </div>
<?php
\common\Core::dump($lst);