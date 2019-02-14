<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 14.02.2019
 * Time: 14:33
 */

namespace common\models;


use yii\base\Model;

class Portfolio extends Model
{
    public $id;
    public $name;
    public $dt_begin;
    public $type_id;
    public $txt;
    public $task;
    public $url;

    public function rules()
    {
        return [
            [['id', 'type_id'], 'integer'],
            [['url', 'string']],
            [['name', 'txt', 'task'], 'required'],
            [['dt_begin'], 'date', 'format' => 'php:Y-m-d']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',

        ];
    }

    public function lst()
    {
        $sql = "select * from portfolio 
                join type  on portfolio.type_id = type.id";
        $all = \yii::$app->db->createCommand($sql)->queryAll();
        return $all;
    }
    public function get($type_id)
    {
        $sql = "select *
        from portfolio
        where type_id = :type_id";
        $one = \yii::$app->db->createCommand($sql, ['type_id' => $type_id])->queryOne();
        $this->attributes = $one;
        return $one;
    }
}