<?php

/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 10.08.2018
 * Time: 14:53
 */

/* @var $this \yii\web\View */


?>
    <div class="row ">
        <div class="col-sm-12 pt-5 pb-5"><a href="/admin/codes/edit" class="btn btn-primary">Добавить код</a></div>
        <div class="col-sm-8">
            <?php \yii\widgets\Pjax::begin(['linkSelector' => false, 'id' => 'grid-container']); ?>
            <?= \yii\grid\GridView::widget([
                'dataProvider' => $provider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'headerOptions' => [
                            'width' => '50%'
                        ],
                        'label' => 'Тип кода',
                        'value' => 'type_name'
                    ],
                    [
                        'headerOptions' => [
                            'width' => '100%'
                        ],
                        'label' => 'Код',
                        'value' => 'code'
                    ],
                    [
                        'headerOptions' => [
                            'width' => '100%'
                        ],
                        'label' => 'Примечание',
                        'value' => 'note'
                    ],
                    [
                        'label' => 'Редактировать',
                        'format' => 'raw',
                        'contentOptions' => [
                            'nowrap' => 'nowrap'
                        ],
                        'value' => function ($model) {
                            $ret = '<div class="text-center">';
                            $ret .= '<a href="/admin/codes/edit?id=' . $model['id'] . '" class="btn btn-xs btn-default" title="Редактировать"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                            $ret .= '</div>';

                            return $ret;
                        }
                    ]


                ],
            ]); ?>
            <?php \yii\widgets\Pjax::end(); ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

    </div>

<?php
//\common\Core::dump($provider->getModels());