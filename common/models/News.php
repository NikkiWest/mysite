<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $name
 * @property string $desc_short
 * @property string $desc_full
 * @property int $dt
 * @property string $seo_url
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'seo_url',
                'immutable' => true
            ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'dt',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'dt'
                ],
                'value' => new Expression('NOW()')
            ],
        ];
    }
    public function rules()
    {
        return [
            [['desc_full'], 'string'],
            [['dt'], 'date'],
            [['name', 'seo_url'], 'string', 'max' => 400],
            [['desc_short'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'desc_short' => 'Desc Short',
            'desc_full' => 'Desc Full',
            'dt' => 'Dt',
            'seo_url' => 'Seo Url',
        ];
    }
}
