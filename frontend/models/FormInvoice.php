<?php
/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 14.08.2018
 * Time: 22:46
 */

namespace frontend\models;


use common\Core;
use common\models\Invoice;
use common\models\Rekvizit;
use yii\base\Model;

class FormInvoice extends Model
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
    public $invoice_id;

    private $_user_id;
    private $_rekvizit_id;


    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['inn', 'kpp', 'name', 'add_ur', 'add_post', 'bank_name', 'bik', 'rs', 'ks'], 'string'],

            [['id', 'num_digit', 'y', 'rekvizit_id', 'kol', 'sum'], 'integer'],
            [['num_pref',  'dt_format', 'note', 'kol', 'sum', 'ed'], 'string'],
            [['items'], 'safe'],
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

    public function init()
    {
        $this->_user_id = \Yii::$app->user->id ?? null;
        parent::init();
    }

    public function create()
    {
        $transaction = \yii::$app->db->getTransaction();
        if (!$transaction) $transaction = \Yii::$app->db->beginTransaction();

        try {

            $Rekvizit = new Rekvizit();
            $Invoice = new Invoice();

            $Rekvizit->flag_commit = false;
            $Rekvizit->attributes = $this->attributes;
            $Rekvizit->id = $this->_retLastRekvizitId();
            $Rekvizit->save();

            if ($Rekvizit->hasErrors() === false) {
                $Invoice->flag_commit = false;
                $Invoice->attributes = $this->attributes;
                $Invoice->rekvizit_id = $Rekvizit->id;
                $Invoice->id = $this->_retLastInvoiceId();
                if ($Invoice->id == 0) $Invoice->id = null;

                //if ($Invoice->id == null) {
                    /**
                     * определяем скидку
                     */
                    $user_id = \Yii::$app->user->id ?? null;
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

                    $cost = $tovar['cost'] - ($tovar['cost'] / 100 * $skidka);
                    $item = [
                        'note' => 'Конференция',
                        'ed' => 'шт',
                        'cost' => $cost,
                        'kol' => 1,
                        'sum' => $cost,
                    ];
                    $Invoice->items = [$item];


                    $Invoice->save();
               // }
                $this->invoice_id = $Invoice->id;
            }

            if (($Rekvizit->hasErrors() === false) && $Invoice->hasErrors() === false) {
                $transaction->commit();
            } else {
                $transaction->rollBack();
                $this->addErrors($Rekvizit->errors);
                $this->addErrors($Invoice->errors);
            }
        } catch (Exception $e) {
            $transaction->rollBack();
        }
    }


    public function _retLastRekvizitId()
    {
        if ($this->_rekvizit_id !== null) return $this->_rekvizit_id;
        $sql = "Select rekvizit_id from users where id =:id";
        $this->_rekvizit_id = \yii::$app->db->createCommand($sql, ['id'=>$this->_user_id])->queryScalar();
        if ($this->_rekvizit_id == false) $this->_rekvizit_id = null;
        return $this->_rekvizit_id;
    }

    public function _retLastInvoiceId()
    {
        $sql = "Select id from invoice where rekvizit_id =:id order by id desc";
        $invoice_id = \yii::$app->db->createCommand($sql, ['id'=>$this->_retLastRekvizitId()])->queryScalar();

        return $invoice_id;
    }


}