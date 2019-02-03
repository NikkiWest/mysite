<?php
/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 14.08.2018
 * Time: 21:59
 */

namespace common\models;


use yii\base\Model;

class Rekvizit extends Model
{
    public $id;
    public $inn;
    public $kpp;
    public $name;
    public $add_ur;
    public $add_post;
    public $bank_name;
    public $bik;
    public $rs;
    public $ks;

    public $flag_commit = true;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['inn', 'kpp', 'name', 'add_ur', 'add_post', 'bank_name', 'bik', 'rs', 'ks'], 'string'],
            [['inn', 'name', 'add_ur', 'add_post', 'bank_name', 'bik', 'rs', 'ks'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'inn' => 'ИНН',
            'name' => 'Название организации',
            'add_ur' => 'Юридический адрес',
            'add_post' => 'Почтовый адрес',
            'bank_name' => 'Банк',
            'bik' => 'БИК',
            'rs' => 'Расчетный счет',
            'ks' => 'Корреспонденский счет',
        ];
    }

    public function save()
    {
        if ($this->validate() === false) return;

        $transaction = \yii::$app->db->getTransaction();
        if (!$transaction) $transaction = \Yii::$app->db->beginTransaction();

        try {


            $fld = $params = [];
            $fld['inn'] = $this->inn;
            $fld['kpp'] = $this->kpp;
            $fld['name'] = $this->name;
            $fld['add_ur'] = $this->add_ur;
            $fld['add_post'] = $this->add_post;
            $fld['bank_name'] = $this->bank_name;
            $fld['bik'] = $this->bik;
            $fld['rs'] = $this->rs;
            $fld['ks'] = $this->ks;
            if ($this->id > 0) {
                $params['id'] = $this->id;
                $where = 'id=:id';
                \yii::$app->db->createCommand()->update('rekvizit', $fld, $where, $params)->execute();
            } else {
                \yii::$app->db->createCommand()->insert('rekvizit', $fld)->execute();
                $this->id = \yii::$app->db->getLastInsertID();
            }

            $user_id = \Yii::$app->user->id ?? null;
            if ($user_id > 0) {
                $fld = $params = [];
                $fld['rekvizit_id'] = $this->id;
                $params['id'] = $user_id;
                $where = 'id=:id';
                \yii::$app->db->createCommand()->update('users', $fld, $where, $params)->execute();

            }

            if ($this->flag_commit === true) $transaction->commit();
        } catch (Exception $e) {
            if ($this->flag_commit === true) $transaction->rollBack();
        }
    }

    public function get()
    {
        $sql = "Select rekvizit.* from rekvizit where rekvizit.id = :id";
        $row = \yii::$app->db->createCommand($sql, ['id' => $this->id])->queryOne();
        $this->attributes = $row;

        return $row;
    }

}