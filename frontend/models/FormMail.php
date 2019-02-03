<?php
/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 21.08.2018
 * Time: 14:51
 */

namespace frontend\models;


use common\models\Users;
use yii\base\Model;

class FormMail extends Model
{
    public function sendConf(Users $Users)
    {

        $FormBilet = new FormBilet();
        $FormBilet->create($Users);
        $fName = $FormBilet->getDir($Users);

        \Yii::$app->mailer->compose('registrationConf-html', ['Users' => $Users])
            ->setFrom('info@phzn.ru')
            ->setTo($Users->email)
            ->setSubject('Успешная регистрация Digital Pharma - билет участника!')
            ->attach($fName)
            ->send();

    }

}