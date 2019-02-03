<?php
/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 16.08.2018
 * Time: 11:51
 */


$rekvizit= $invoice->rekvizit;
//\common\Core::dump($rekvizit);return;

?>


            <div class="text-right" style="font-weight: bold; font-size: 12px">
                <b>Адрес: 630099, Россия, г. Новосибирск,
                    <br>
                    ул. Коммунистическая, д. 27/29, офис 39
                    <br>
                    тел. 8(499)213-05-00
                    <br>
                </b>
            </div>
    <br><br><br>
    <table cellspacing="1" width="100%">
        <tr style="margin-bottom: 20px; font-weight: bold;">
        <tr>
            <td rowspan="2" colspan="2" class="brd_t brd_l" valign="top">
                <div>
                    <?= $invoice['rekvizit']['bank_name']; ?>
                </div>

                <?php
//                $cnt = mb_strlen($invoice['rekvizit']['bank_name'], 'UTF-8');
//                $height = ($cnt > 50) ? 10 : 20;
                ?>

                <div style="font-size: 10px;">Банк получателя</div>
            </td>
            <td class="brd_t brd_l">БИК</td>
            <td class="brd_t brd_l brd_r"><?= $invoice['rekvizit']['bik']; ?></td>
        </tr>
        <tr>
            <td class="brd_t brd_l">Сч. №</td>
            <td class=" brd_l brd_r"><?= $invoice['rekvizit']['ks']; ?></td>
        </tr>

        <tr>
            <td class="brd_l brd_t">ИНН <?= $invoice['rekvizit']['inn']; ?></td>
            <td class="brd_l brd_t">КПП <?= $invoice['rekvizit']['kpp']; ?></td>
            <td class="brd_t brd_l">Сч. №</td>
            <td class="brd_t brd_l brd_r"><?= $invoice['rekvizit']['rs']; ?></td>
        </tr>

        <tr>
            <td class="brd_l brd_t brd_b" colspan="2">
                <div>
               ООО "ФЦ" "Знание"
                </div>

                <div style="font-size: 10px;">Получатель</div>
            </td>
            <td class="brd_l brd_b"></td>
            <td class="brd_l brd_r brd_b"></td>
        </tr>

    </table>

    <div style="margin-top: 10px; margin-bottom: 10px;">
        ЗАКАЗЧИК: <?=$rekvizit['name']?>
        <br>
        Основание: Общий договор
        <!--    --><?php
        //    $invoice['rekvizit_id'];
        //    $date = $invoice ['rekvizit']['learn_dt'];
        //    if( $date ==! null){
        //        echo "договор №". $invoice['rekvizit_id'];
        //        echo " от ".date("d.m.Y", strtotime($date));
        //    } else{
        //        echo "Основной договор";
        //    }
        //
        //    ?>
        <br>
    </div>

    <div style="text-align: center; font-size: 20px; margin-top: 10px;">
       Счет № <?= $invoice['id'];?>
    </div>
    <div style="border-bottom: 2px solid #000; margin-top: -5px; margin-bottom: 20px;">&nbsp;</div>

    <table cellspacing="0" width="100%">
        <tbody>
        <tr>
            <td valign="top">Поставщик</td>
            <td style="font-size: 11px; padding-left: 5px;">
                ООО "ФЦ "Знание", ИНН 5406791049, КПП 540701001, 630099, г. Новосибирск, ул. Коммунистическая,
                д.27/29, офис 32,39, телефон 8(499)213-05-00
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 5px;">&nbsp;</td>
        </tr>
        <tr>
            <td valign="top">Плательщик</td>
            <td style="font-size: 11px; padding-left: 5px;">
                <?php
                $str = "{$rekvizit['name']}, ИНН {$rekvizit['inn']}, КПП {$rekvizit['kpp']}, {$rekvizit['add_ur']}";
                echo $str;
                ?>
            </td>
        </tr>
        </tbody>
    </table>
    <br><br>
    <table cellspacing="0" width="100%" style="font-size: 12px;">
    <thead>
    <tr>
        <th class="brd_b brd_t brd_l">№</th>
        <th class="brd_b brd_t brd_l">Наименование</th>
        <th class="brd_b brd_t brd_l" style="text-align: right">Кол-во</th>
        <th class="brd_b brd_t brd_l" style="text-align: right">Ед.</th>
        <th class="brd_b brd_t brd_l" style="text-align: right">Цена</th>
        <th class="brd_b brd_t brd_l brd_r" style="text-align: right">Сумма</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sum_all = 0;
    $i = 0;
    $kol_all = 0;
    $fontSize = 12;

    foreach ($invoice->items as $item) {
        $i++;
        if ($i > 7) break;
        $sum = $item['sum'] / 100;
        $sum_all += $sum;

        $kol_all += $item['kol'];

        $cost = $sum / $item['kol'];
        $cost = number_format($cost, 2, ',', ' ');
        $sum = number_format($sum, 2, ',', ' ');

        $users = $item['users'] ?? [];
        if (count($users) > 1) {
            $users_str = implode(', ', $users);
            $item['note'] = "Оказание образовательных услуг по участию в цикле {$item['training_name']} (обучающиеся: $users_str)";
        }

        ?>
        <tr>
            <td class="brd_b brd_l"><?= $i; ?></td>
            <td class="brd_b brd_l" style="font-size: <?=$fontSize; ?>px"><?= $item['note']; ?></td>
            <td class="brd_b brd_l" style="text-align: right"><?= $item['kol']; ?></td>
            <td class="brd_b brd_l" style="text-align: right">шт.</td>
            <td class="brd_b brd_l" nowrap="nowrap" style="text-align: right"><?= $cost; ?></td>
            <td class="brd_b brd_l brd_r" nowrap="nowrap" style="text-align: right"><?= $sum; ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>

    </table>

    <?php
    $sum_all = number_format($sum_all, 2, ',', ' ');
    ?>

           <div class="text-right" style="font-size: 12px;"> <b>Итого</b> <?= $sum_all; ?> р.</div>


           <div class="text-right" style="font-size: 12px;" ><b>Без налога на НДС</b> -</div>


    <div class="text-right "style="font-size: 12px;" ><b>Всего к оплате</b> <?= $sum_all; ?> р.</div>


    <div style="font-size: 12px;">
        Всего наименований <b><?= $kol_all; ?></b> на сумму <b><?= $sum_all; ?> руб.</b>
        <?php
        $ManyToText = new  \common\helpers\numToText\ManyToText();
        $sum_all_convert = $ManyToText->Convert($sum_all);
        echo "<br /><b>$sum_all_convert</b> <br>";
        ?>
        Основание: Основной договор
    </div>
<br><br><br>
<div style="border-bottom: 2px; margin: 5px; margin-bottom: 20px;">&nbsp;</div>
<div style="width: 45%; float: left;">
    <table cellspacing="1" width="98%">
        <tr>
            <td>
                <b>Руководитель</b>
            </td>
            <td class="brd_b" style="width: 100%; text-align: right;">

                Ватутина Е. А.
            </td>
        </tr>
    </table>

        <div style="margin-top: -50px; margin-left: 150px;">
            <img src="https://pharmznanie.ru/img/pdf/sign_vatutina.png" alt="" style="height: 50px;">
        </div>

</div>
<div style="width: 45%; float: right;">
    <table cellspacing="1" width="98%">
        <tr>
            <td>
                <b>Бухгалтер</b>
            </td>
            <td class="brd_b" style="width: 100%; text-align: right">Амелина Т. И.</td>
        </tr>
    </table>
        <img src="https://pharmznanie.ru/img/pdf/sign_buh.png" alt="" height="50" style="margin-top: -50px; margin-left: 150px;">

</div>
