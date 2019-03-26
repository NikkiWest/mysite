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
        $sql = "select portfolio.*,type.name as type_name, type_portfolio.id_type as type_id
 from portfolio 
                join type_portfolio on portfolio.id = type_portfolio.id_portfolio 
                join type  on type_portfolio.id_type = type.id ";
        $all = \yii::$app->db->createCommand($sql)->queryAll();
        $ar = [];
        foreach ($all as $item) {
            $item['img'] = '/img/pathers/' . $item['id'] . '.png';
            $ar[$item['id']] = $item;
        }
        return $ar;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        $sql = "select * from type";
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

    public function getIdForSlug($slug){
        $slug = "$slug";
        $sql = "
        select id 
        from portfolio
        where seo_url = :slug";
        $id = \yii::$app->db->createCommand($sql, ['slug' => $slug])->queryScalar();
        return $id;
    }

    public function getPortfolioOne($id){
        $sql = "select portfolio.* , type.name as type_name, type_portfolio.id_type as type_id
        from portfolio
        join type_portfolio on portfolio.id = type_portfolio.id_portfolio
        join type on type_portfolio.id_type = type.id
        where portfolio.id = :id";
        $one = \yii::$app->db->createCommand($sql, ['id' => $id])->queryOne();
        return $one;
    }
}