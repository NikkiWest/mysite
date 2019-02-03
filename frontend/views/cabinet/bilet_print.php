<?php

/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 20.08.2018
 * Time: 20:00
 */

/* @var $this \yii\web\View */
/* @var $Users \common\models\Users */

$code = $Users['code'] ?? null;
?>

    <table class="table">
        <tbody>
        <tr>
            <td><img src="http://conf.phzn.ru/img/bilet/logo.png" alt="" width="300" style="padding-bottom: 30px">
                <div class="dataPdf"> 19 октября 2018</div>
            </td>
            <td style="padding: 0px 30px;"><img src="http://conf.phzn.ru/img/bilet/text.svg" width="100%" alt=""></td>
            <td  style="font-size: 20px; color: #5e5e5e; text-align: center;"><img src="http://conf.phzn.ru/img/bilet/qr-code.png" width="220" alt="" style="padding-bottom: 30px">
                <?php
                if ($code!= null) {
                    ?>
                    <div style="text-align: center">Промокод:<?= $code; ?> </div>
                    <?php
                }
                    ?>
            </td>
        </tr>
        <tr>
            <td></td>
        </tr>
        </tbody>
    </table>


         <div style="font-size:18px; padding-bottom: 20px; color:#009DE0 "><span style=" font-size: 16px;"> &nbsp;11:00 &#8195;</span> г. Москва, ул. Мясницкая 13, стр. 18</div>

                <div style=" font-size: 18px; font-weight: bold;color:#009DE0"> <?= "&nbsp;".$Users['name_f'] . " " . $Users['name_i']. " &#8195;&#8195;&#8195;" . $Users['firm_name']; ?> </div>







<?php
//\common\Core::dump($Users);
