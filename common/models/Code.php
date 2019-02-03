<?php
namespace common\models;

use common\Core;

/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 10.08.2018
 * Time: 14:54
 */

class Code extends \yii\base\Model
{
    public $id;
    public $type_id;
    public $code;
    public $note;
    public $user_id;

    public function rules()
    {
        return [
            [['id', 'type_id','user_id'], 'integer'],
            [['code', 'note'], 'string'],
            [['type_id', 'code'], 'required' , 'message'=> 'Поле не может быть пустое'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'type_id' => 'Тип',
            'code' => 'Код',

        ];
    }

    public function get()
    {
        $sql = "Select code.* from code where code.id=:id";
        $ret = \yii::$app->db->createCommand($sql, ['id'=>$this->id])->queryOne();
        $this->attributes = $ret;

        return $ret;
    }

    public function save()
    {
        if ($this->validate() === false) return;

            $fld = $params = [];
            $fld['type_id']= $this->type_id;
            $fld['code'] = $this->code;
            $fld['note'] = $this->note;
            $fld['user_id'] = $this->user_id;
        if ($this->id > 0) {
            $params['id'] = $this->id;
            $where = 'id=:id';
            \yii::$app->db->createCommand()->update('code', $fld, $where, $params)->execute();
        } else {
//            $fld = [];
//            $this->id = \yii::$app->db->getLastInsertID();
            \yii::$app->db->createCommand()->insert('code', $fld)->execute();
        }

    }

    public function search($config)
        {
            $pageSize = $config['pageSize'] ?? 50;

            $fnd = $config['fnd'] ?? null;
            $fnd = trim($fnd);
            if ($fnd == '') $fnd = null;
            if ($fnd !== null) $fnd = "%$fnd%";

            $sql = "Select {{fld}} from code join code_type on code_type.id = code.type_id";

            $params = [];
            $fld = "COUNT(*)";
            $sqlCnt = str_replace('{{fld}}', $fld, $sql);
            $cnt = \yii::$app->db->createCommand($sqlCnt, $params)->queryScalar();

            $fld = "code.*, code_type.name as type_name";
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
                            'asc' => ['code.id' => SORT_ASC],
                            'desc' => ['code.id' => SORT_DESC],
                            'default' => SORT_ASC,
                            'label' => 'ID',
                        ]
                    ],
                    'defaultOrder' => ['id'=>SORT_DESC],
                ],
            ]);

            $models = $provider->getModels();
            $ar = [];
            foreach ($models as $model) {
                $ar[] = $model;
            }
            $provider->setModels($ar);

            return $provider;

        }

        public function typeLst()
        {
                $sql= 'select * from code_type';
                $all= \yii::$app->db->createCommand($sql)->queryAll();
                return $all;
        }

}