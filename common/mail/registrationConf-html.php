<?php
/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 20.08.2018
 * Time: 16:36
 */

$user_name = trim($Users->name_i . ' ' . $Users->name_o);
$email = $Users->email;
$pw = $Users->pw;

?>


    <div style="margin-bottom: 10px">Здравствуйте, <?= $user_name; ?>!</div>
    <div style="margin-bottom: 10px">Вы зарегистрированы на конференцию <a href="conf.phzn.ru/">Digital Pharma</a>!<br>
      Билет участника прикреплен в файле к этому письму.
    </div>
    <div style="margin-bottom: 10px">Ждём вас 19 октября 2018 г. по адресу г. Москва, ул. Мясницкая, 13, стр. 18 (Фонд
        развития интернет-инициатив).
    </div>
    <div style="margin-bottom: 10px">Встреча гостей с 10 до 11:00. Начало конференции в 11:00, завершение в 16:30.</div><br><br>

    <div style="margin-bottom: 10px; margin-top: 10px">Программа конференции регулярно дополняется и обновляется на сайте
        <a href="conf.phzn.ru/">http://conf.phzn.ru/</a></div>

    <div>Также о важнейших новостях конференции мы будем уведомлять вас по почте.</div><br>

    <div style="margin-bottom: 20px; margin-top: 20px">Если у вас есть вопросы о конференции Digital Pharma, пожалуйста,
        направляйте их на адрес <a href="mailto:info@pharmznanie.ru">info@pharmznanie.ru</a></div>

    <div style="margin-top: 15px">
        С уважением, организационный комитет конференции Digital Pharma <br><br>
        <a href="mailto:info@pharmznanie.ru">info@pharmznanie.ru</a> <br><br>
        Тел. 8 (499) 213-05-00
    </div>


<?php
//\common\Core::dump($Users);