<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 06.03.2019
 * Time: 12:56
 */
$controller_id  = $action->controller->id;
?>
<?php
return [
    ['label' => 'Разработка сайтов', 'url' => '#', 'active'=>($controller_id=='developer'), 'options'=> ['class'=>'dop_menu'], 'items' => [
        ['label' => 'Сайт-визитка', 'url' => '/service/developer/business-card', 'active' => ($controller_id == 'developer') and ($action->id=='business-card')],
        ['label' => 'Landing Page', 'url' => '/service/developer/ready-decision', 'active' => ($controller_id == 'developer') and ($action->id=='ready-decision')],
        ['label' => 'Корпоративный сайт', 'url' => '/service/developer/corp-site', 'active' => ($controller_id == 'developer') and ($action->id=='corp-site')],
        ['label' => 'Интернет-магазин', 'url' => '/service/developer/shop-site', 'active' => ($controller_id == 'developer') and ($action->id=='shop-site')],
    ]],
    ['label' => 'Разработка web-приложений', 'url' => '/service/developer-web', 'active'=>($controller_id=='developer-web')],
    ['label' => 'Доработка сайтов', 'url' => '/service/rework', 'active'=>($controller_id=='rework')],
    ['label' => 'Обслуживание сайтов', 'url' => '/service/maintenance', 'active'=>($controller_id=='maintenance')],
];

