<?php
/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 27.08.2018
 * Time: 12:12
 */

namespace console\controllers;


use common\Core;
use common\models\Users;
use console\models\mail\RemindOplata;
use frontend\models\FormBilet;
use yii\console\Controller;

class MailController extends Controller
{
    public function actionRemindOplata()
    {
        return;
        $RemindOplata = new RemindOplata();
        $RemindOplata->sendAll();

    }

    public function actionFinalSubj()
    {
        return;
//        Core::dump(\Yii::$app->db, 10,0); die;

        $sql = "Select * from users where flag_oplata_1 = 1 and flag_send_mail is null
        and users.email in (
        
        )";
        $all = \yii::$app->db->createCommand($sql)->queryAll();

        $filePath = \Yii::getAlias("@frontend/web/tmp/letter.php");
        foreach ($all as $item) {
            $email = $item['email'];
            echo "$email\n";
            //$email = 'kutsanov@mail.ru';
            //$email = 'kosttt12@ya.ru';
            $fld = $params = [];
            $fld['flag_send_mail'] = 1;
            $params['id'] = $item['id'];
            $where = 'id=:id';
            \yii::$app->db->createCommand()->update('users', $fld, $where, $params)->execute();


            $User = new Users();
            $User->id = $item['id'];
            $User->get();

            $FormBilet = new FormBilet();
            $FormBilet->create($User);
            $fName = $FormBilet->getDir($User);


            $params = [];
            $params['name'] = $item['name_i'] . ' ' . $item['name_o'];
            $Controller = new \yii\base\Controller(null, null);
            $body = $Controller->renderFile($filePath, $params);

            \Yii::$app->mailer->compose()
                ->setFrom(['info@phzn.ru'=>'Digital Pharma'])
                ->setTo($email)
                ->setHtmlBody($body)
                ->setSubject('Напоминаем, конференция уже в эту пятницу!')
                ->attach($fName)
                ->send();
            //break;
        }

    }

}
