<?php
/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 13.08.2018
 * Time: 13:20
 */

namespace common\models;


use common\Core;
use yii\base\Model;

class Users extends Model
{
    public $id;
    public $name_f;
    public $name_i;
    public $name_o;
    public $firm_name;
    public $email;
    public $phone;
    public $pw;
    public $code;
    public $rekvizit_id;
    public $dt_create;
    public $flag_oplata_1;
    public $post_name;
    public $dt;
    public $flag_send_mail;

    public $sum_rub;

    private $_code_id;
    private $_code_type;

    public function rules()
    {
        return [
            [['id', 'sum_rub', 'flag_oplata_1'], 'number'],
            [['name_f', 'name_i', 'name_o', 'firm_name', 'phone', 'code', 'dt_create', 'post_name'], 'string'],
            [['email'], 'email'],
            [['pw'], 'safe'],
            [['email', 'name_f', 'name_i', 'firm_name', 'post_name', 'phone'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'phone' => 'Телефон',
            'post_name' => 'Должность',
            'email' => 'E-mail',
            'pw' => 'Пароль',
            'name_f' => 'Фамилия',
            'name_i' => 'Имя',
            'firm_name' => 'Компания'
        ];
    }

    public function beforeValidate()
    {
        if (($this->pw == null) && ($this->id == null)) {
            $this->pw = rand(1000, 9999);
        }

        if ($this->code != null) {
            $sql = "Select code.id, concat(ifnull(users.name_f,''), ' ', ifnull(users.name_i,'')) as user_name,
            code.user_id, code.type_id
            from code
            left join users on code.user_id = users.id
            where upper(code.code) = :code";
            $row = \yii::$app->db->createCommand($sql, ['code' => $this->code])->queryOne();
            if ($row === false) $this->addError('code', "Код <b>{$this->code}</b> отсутствует в базе");
            elseif ($row['user_id'] != null) $this->addError('code', "Код <b>{$this->code}</b> использован и принадлежит <b>{$row['user_name']}</b>");
            else {
                $this->_code_id = $row['id'];
                $this->_code_type = $row['type_id'];
            }
        }

        $sql = "Select id from users where email=:email and (id <> :id or :id is null)";
        $id = \yii::$app->db->createCommand($sql, ['email' => $this->email, 'id' => $this->id])->queryScalar();

        if ($id > 0) {
            $this->addError('email', 'Email <b>' . $this->email . '</b> уже зарегистрирован');
        }


        return parent::beforeValidate();
    }

    public function get()
    {
        $sql = "Select users.*, code.code, code_type.skidka, code_type.name as code_type_name,
                date_format(users.dt_create, '%d.%m.%Y') as dt_create_format
                from users
                left join code on users.id = code.user_id
                left join code_type on code.type_id = code_type.id
                where users.id = :id";
        $params = [];
        $params['id'] = $this->id;
        $row = \yii::$app->db->createCommand($sql, $params)->queryOne();

        $sql = "Select * from tovar where id = 1";
        $tovar = \yii::$app->db->createCommand($sql)->queryOne();

        $row['sum_rub'] = ($tovar['cost'] - ($tovar['cost'] / 100 * $row['skidka'])) / 100;

        $this->attributes = $row;

        return $row;
    }
    public function cntAll()
    {
//        if ($last !== null) {
//            list($Y,$m,$d) = explode('-', date('Y-m-d'));
//            $dt = date("Y-m-d", mktime(0, 0, 0, $m, $d-$last, $Y));
//        } else $dt = null;

        $sql = "Select count(id)
                from users
                where flag_oplata_1 = 1";
        $cnt = \yii::$app->db->createCommand($sql)->queryScalar();
        return $cnt;
    }
    public function save()
    {
        if ($this->validate() === false) return;

        $transaction = \yii::$app->db->getTransaction();
        if (!$transaction) $transaction = \Yii::$app->db->beginTransaction();

        try {


            $fld = $params = [];
            $fld['name_f'] = $this->name_f;
            $fld['name_i'] = $this->name_i;
            $fld['name_o'] = $this->name_o;
            $fld['firm_name'] = $this->firm_name;
            $fld['email'] = $this->email;
            $fld['phone'] = $this->phone;
            $fld['post_name'] = $this->post_name;
            if ($this->pw != null) $fld['pw'] = $this->pw;
            if ($this->id > 0) {
                $params['id'] = $this->id;
                $where = 'id=:id';
                \yii::$app->db->createCommand()->update('users', $fld, $where, $params)->execute();
            } else {
                \yii::$app->db->createCommand()->insert('users', $fld)->execute();
                $this->id = \yii::$app->db->getLastInsertID();
            }

            if ($this->_code_id > 0) {
                $fld = $params = [];
                $fld['user_id'] = $this->id;
                $params['id'] = $this->_code_id;
                $where = 'id=:id';
                \yii::$app->db->createCommand()->update('code', $fld, $where, $params)->execute();

                if ($this->_code_type == 2) {
                    $fld = $params = [];
                    $fld['flag_oplata_1'] = 1;
                    $params['id'] = $this->id;
                    $where = 'id=:id';
                    \yii::$app->db->createCommand()->update('users', $fld, $where, $params)->execute();

                }
            }

            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollBack();
        }

    }

    public function search($config)
    {
        $pageSize = $config['pageSize'] ?? 50;

        $fnd = $config['fnd'] ?? null;
        $fnd = trim($fnd);
        if ($fnd == '') $fnd = null;
        if ($fnd !== null) $fnd = "%$fnd%";

        $sql = "Select {{fld}}
from users
left join code on users.id = code.user_id
left join code_type on code.type_id = code_type.id
left join rekvizit on rekvizit.id = users.rekvizit_id
left join invoice on invoice.id = (Select max(i.id) from invoice i where i.rekvizit_id = rekvizit.id)";

        $params = [];
        $fld = "COUNT(*)";
        $sqlCnt = str_replace('{{fld}}', $fld, $sql);
        $cnt = \yii::$app->db->createCommand($sqlCnt, $params)->queryScalar();

        $fld = "users.*, code.code, code_type.name as code_type_name, concat(invoice.num_pref, '-', invoice.num_digit) as invoice_num";
        $sqlLst = str_replace('{{fld}}', $fld, $sql);

        $provider = new \yii\data\SqlDataProvider([
            'sql' => $sqlLst,
            'params' => $params,
            'totalCount' => $cnt,
            'pagination' => [
                'pageSize' => $pageSize,
            ],
            'sort' => [
                'attributes' => [
                    'id' => [
                        'asc' => ['users.id' => SORT_ASC],
                        'desc' => ['users.id' => SORT_DESC],
                        'default' => SORT_ASC,
                        'label' => 'ID',
                    ]
                ],
                'defaultOrder' => ['id' => SORT_DESC],
            ],
        ]);

//        $models = $provider->getModels();
//        $ar = [];
//        foreach ($models as $model) {
//            $ar[] = $model;
//        }
//        $provider->setModels($ar);

        return $provider;
    }

    /**
     * Установление факта оплаты
     *
     * $this->id - идентфикатор пользователя для которого устанавливаем оплату
     */


    public function setOplata()
    {
        $fld = $params = [];
        $fld['flag_oplata_1'] = 1;
        $params['id'] = $this->id;
        $where = 'id=:id';
        \yii::$app->db->createCommand()->update('users', $fld, $where, $params)->execute();


    }
}
