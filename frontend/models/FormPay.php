<?php
/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 20.08.2018
 * Time: 14:44
 */

namespace frontend\models;


use common\Core;
use common\models\Users;
use yii\base\Model;

class FormPay extends Model
{
    private $_user_id;

    public function init()
    {
        $this->_user_id = \Yii::$app->user->id ?? null;
        parent::init();
    }

    public function getCost()
    {
        $user_id = $this->_user_id;
        $skidka = 0;

        if ($user_id > 0) {
            $sql = "Select code_type.skidka
                    from code
                    join code_type on code_type.id = code.type_id
                    where code.user_id = :user_id";

            $skidka = \yii::$app->db->createCommand($sql, ['user_id'=>$user_id])->queryScalar();
        }

        $skidka = (int) $skidka;


        $sql = "Select * from tovar where id = 1";
        $tovar = \yii::$app->db->createCommand($sql)->queryOne();

        $cost = ($tovar['cost'] - ($tovar['cost'] / 100 * $skidka)) / 100;

        return $cost;
    }

    public function getName()
    {
        $name = 'Оплата конференции - ' . $this->_user_id;

        return $name;
    }

    public function getSkidkaByCode($code)
    {
        $sql = "Select code.*, code_type.skidka
            from code
            join code_type on code.type_id = code_type.id
            where code.code = :code";
        $params = [];
        $params['code'] = $code;
        $row = \yii::$app->db->createCommand($sql, $params)->queryOne();
        if ($row==false) return 0;

        $skidka = $row['skidka'];
        if ($row['user_id'] > 0) {
            $user_id = \Yii::$app->user->id ?? null;
            if ($row['user_id'] <> $user_id) $skidka = 0;
        }

        return $skidka;
    }

    public function getCostByCode($code)
    {
        $skidka = $this->getSkidkaByCode($code);

        $sql = "Select cost from tovar where id = 1";
        $cost = \yii::$app->db->createCommand($sql)->queryScalar();

        $cost = round(($cost - ($cost / 100 * $skidka))/100);

        return $cost;
    }

    public function saveCode($code, $user_id = null)
    {
        if ($user_id === null) {
            $user_id = \Yii::$app->user->id ?? null;
        }

        if ($user_id == 0) return;

        $sql = "Select code.*, code_type.skidka
            from code
            join code_type on code.type_id = code_type.id
            where code.code = :code";
        $params = [];
        $params['code'] = $code;
        //$params['user_id'] = $user_id;
        $row = \yii::$app->db->createCommand($sql, $params)->queryOne();

        if ($row=== false) return;
        else {
            if ($row['user_id'] > 0) {
                if ($row['user_id'] <> $user_id) return;
            }
        }

        $transaction = \yii::$app->db->getTransaction();
        if (!$transaction) $transaction = \Yii::$app->db->beginTransaction();

        try {

        if ($row['skidka'] == 100) {
            $fld = $params = [];
            $fld['flag_oplata_1'] = 1;
            $params['id'] = $user_id;
            $where = 'id=:id';
            \yii::$app->db->createCommand()->update('users', $fld, $where, $params)->execute();

            $Users = new Users();
            $Users->id = $user_id;
            $Users->get();
            $FormMail = new FormMail();
            $FormMail->sendConf($Users);

        }


        $fld = $params = [];
        $fld['user_id'] = $user_id;
        $params['id'] = $row['id'];
        $where = 'id=:id';
        \yii::$app->db->createCommand()->update('code', $fld, $where, $params)->execute();


            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollBack();
        }
    }

}