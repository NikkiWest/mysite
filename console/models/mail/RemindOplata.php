<?php
/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 27.08.2018
 * Time: 12:13
 */

namespace console\models\mail;


use common\Core;
use common\models\Users;
use yii\base\Model;

class RemindOplata extends Model
{

    private function send(Users $Users)
    {
        \Yii::$app->mailer->compose('remindOplata-html', ['Users' => $Users])
            ->setFrom('info@phzn.ru')
            ->setTo($Users->email)
            ->setSubject('Напоминание! Завершите регистрацию в конференции Digital Pharma!')
            ->send();

        \Yii::$app->mailer->compose('remindOplata-html', ['Users' => $Users])
            ->setFrom('info@phzn.ru')
            ->setTo('kutsanov@mail.ru')
            ->setSubject('Проверка - Напоминание! Завершите регистрацию в конференции Digital Pharma!')
            ->send();
    }

    public function sendAll()
    {
        list($Y,$m,$d) = explode('-', date('Y-m-d'));

        $sql = "Select id from users where dt > :dt_from and dt < :dt_to and flag_oplata_1 is null";
        $params = [];
        $params['dt_from'] = date('Y-m-d 00:00:00', mktime(0,0,0,$m,$d-4, $Y));
        $params['dt_to'] = date('Y-m-d 23:59:59', mktime(0,0,0,$m,$d-4, $Y));

        $all = \yii::$app->db->createCommand($sql, $params)->queryAll();

        foreach ($all as $item) {
            $Users = new Users();
            $Users->id = $item['id'];
            $Users->get();

            $this->send($Users);
        }



    }

}