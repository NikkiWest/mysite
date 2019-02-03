<?php
/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 14.08.2018
 * Time: 22:27
 */

namespace common\models;


use yii\base\Model;

class Invoice extends Model
{
    public $id;
    public $num_pref;
    public $num_digit;
    public $dt;
    public $dt_format;
    public $y;
    public $rekvizit_id;

    public $note;
    public $kol;
    public $sum;
    public $sum_rub;
    public $ed;

    public $rekvizit;
    public $items;
    public $flag_commit = true;

    public function rules()
    {
        return [
            [['id', 'num_digit', 'y', 'rekvizit_id', 'kol', 'sum'], 'number'],
            [['num_pref', 'dt', 'dt_format', 'note', 'kol', 'sum', 'ed'], 'string'],
            [['items', 'rekvizit'], 'safe'],
            [['num_digit', 'num_pref', 'rekvizit_id'], 'required'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'num_digit' => 'Префикс',
            'num_pref' => 'Номер',
            'dt_format' => 'Дата',
        ];
    }

    public function beforeValidate()
    {
        if ($this->dt_format != '') {
            list($d, $m, $Y) = explode('.', $this->dt_format);
            $this->dt = date('Y-m-d', mktime(0, 0, 0, $m, $d, $Y));
        }

        if ($this->dt != null) {
            list($Y) = explode('-', $this->dt);
            $this->y = $Y;
        }

        if ($this->num_digit == null) {
            if ($this->id > 0) {
                $sql = "Select num_digit from invoice where id = :id";
                $this->num_digit = \yii::$app->db->createCommand($sql, ['id' => $this->id])->queryScalar();
            } else {
                $sql = "Select max(num_digit) from invoice where y=:y";
                $num = \yii::$app->db->createCommand($sql, ['y' => $this->y])->queryScalar();
                $this->num_digit = $num + 1;
            }
        }

        if ($this->id == null) {
            $this->dt = date('Y-m-d');
            $this->y = date('Y');
        }

        $this->num_pref = 'КОНФ';


        return parent::beforeValidate();
    }

    public function save()
    {
        if ($this->validate() === false) return;

        $transaction = \yii::$app->db->getTransaction();
        if (!$transaction) $transaction = \Yii::$app->db->beginTransaction();

        try {

            $fld = $params = [];
            $fld['num_pref'] = $this->num_pref;
            $fld['num_digit'] = $this->num_digit;
            $fld['dt'] = $this->dt;
            $fld['y'] = $this->y;
            $fld['rekvizit_id'] = $this->rekvizit_id;
            if ($this->id > 0) {
                $params['id'] = $this->id;
                $where = 'id=:id';
                \yii::$app->db->createCommand()->update('invoice', $fld, $where, $params)->execute();
            } else {
                \yii::$app->db->createCommand()->insert('invoice', $fld)->execute();
                $this->id = \yii::$app->db->getLastInsertID();
            }

            $params = [];
            $params['id'] = $this->id;
            $where = 'invoice_id=:id';
            \yii::$app->db->createCommand()->delete('invoice_item', $where, $params)->execute();

            foreach ($this->items as $item) {

                if (isset($item['sum_rub'])) $item['sum'] = round($item['sum_rub'] * 100);

                $fld = [];
                $fld['invoice_id'] = $this->id;
                $fld['note'] = $item['note'];
                $fld['kol'] = $item['kol'];
                $fld['sum'] = $item['sum'];
                $fld['ed'] = $item['ed'];
                \yii::$app->db->createCommand()->insert('invoice_item', $fld)->execute();
            }
            if ($this->flag_commit === true) $transaction->commit();
        } catch (Exception $e) {
            if ($this->flag_commit === true) $transaction->rollBack();
        }

    }

    public function get()
    {
        $sql = "Select invoice.*
        from invoice
        where invoice.id = :id";
        $row = \yii::$app->db->createCommand($sql, ['id' => $this->id])->queryOne();

        $Rekvizit = new Rekvizit();
        $Rekvizit->id = $row['rekvizit_id'];
        $Rekvizit->get();
        $row['rekvizit'] = $Rekvizit;

        $sql = "Select invoice_item.*
        from invoice_item
        where invoice_item.invoice_id = :invoice_id";
        $row['items'] = \yii::$app->db->createCommand($sql, ['invoice_id' => $this->id])->queryAll();

        $this->attributes = $row;

        return $row;
    }


}