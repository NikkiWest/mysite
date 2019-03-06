<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 14.02.2019
 * Time: 14:48
 */
?>
<?php
//\common\Core::dump($lst);
?>
<div class="row text-center mb-3">
    <div class="owl-carousel owl-theme portfolio-widget ">
        <?php
        foreach ($lst as $item) {
            $img = "/img/work/small/" . $item['id'] . ".jpg";
            ?>
            <a class="col-lg-3 col-sm-6 col-md-6 mt-3 " href="/portfolio/view/<?= $item['seo_url']; ?>">
                <img class="w-100" src="<?= $img; ?>" alt="<?= $item['name']; ?>">
            </a>
            <?php
        }
        ?>
    </div>
</div>

<?php
$script = <<< JS
   $(window).on('load', function () {
        $(".owl-carousel.portfolio-widget").owlCarousel({
            loop:true,
            margin:20,
            nav: false,
            autoplay:true,
            dots : true,
            
            responsive:{ //Адаптивность. Кол-во выводимых элементов при определенной ширине.
                0:{
                    items:2
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            }
        })
        });

JS;
$this->registerJs($script, yii\web\View::POS_END);
?>
