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
    <div class="owl-carousel owl-theme ">
        <?php
        foreach ($lst as $item) {
            ?>
            <a class="col-lg-3 col-sm-6 col-md-6 mt-3 ">
                <img class="w-100" src="<?=$item['img'];?>" alt="<?=$item['name'];?>">
            </a>
            <?php
        }
        ?>
    </div>
</div>

<?php
$script = <<< JS
        $(".owl-carousel").owlCarousel({
            loop:true,
            margin:20,
            autoplay:true,
            responsive:{ //Адаптивность. Кол-во выводимых элементов при определенной ширине.
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:6
                }
            }
        })

JS;
$this->registerJs($script, yii\web\View::POS_END);
?>
