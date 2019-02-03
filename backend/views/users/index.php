<?php

/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 10.08.2018
 * Time: 12:28
 */

/* @var $this \yii\web\View */

$this->registerJsFile('/admin/js/users.js?v'.YII_V, ['depends'=>[\backend\assets\AppAsset::className()]]);
$this->registerJs("UsersCtrl.actionIndex();",\yii\web\View::POS_END, 'actionIndex')



?>
<h1 class="text-center "> Пользователи, зарегистрированные на конференцию</h1>

    <div class="col-sm-12">

        <div class="f16"> <b>Оплачено:</b> <?=$cntAll;?></div>
        <?php \yii\widgets\Pjax::begin(['linkSelector' => false, 'id' => 'grid-container']); ?>
        <?= \yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'headerOptions' => [
                        'width' => '20%'
                    ],
                    'label' => 'Ф.И.О.',
                    'format' => 'raw',
                    'value' => function ($model) {
                        $ret = $model['name_f']." ". $model['name_i'] ;
                        return $ret;
                    }

                ],
                [
                    'headerOptions' => [
                        'width' => '15%'
                    ],
                    'label' => 'Компания',
                    'value' => 'firm_name'
                ],
                [
                    'headerOptions' => [
                        'width' => '15%'
                    ],
                    'label' => 'Должность',
                    'value' => 'post_name'
                ],
                [
                    'headerOptions' => [
                        'width' => '20%'
                    ],
                    'label' => 'E-mail',
                    'value' => 'email'
                ],
                [

                    'label' => 'Телефон',
                    'value' => 'phone'
                ] ,

                [
                    'headerOptions' => [
                        'width' => '20%'
                    ],
                    'label' => 'Код',
                    'value' => 'code'
                ] ,
                [

                    'label' => 'Тип кода(если есть)',
                    'value' => 'code_type_name'
                ] ,
                [

                    'label' => 'Номер счета',
                    'value' => 'invoice_num'
                ] ,
                [

                    'label' => 'Оплата',
                   'format' => 'raw',
                    'value' => function($model){

                  if( $model['flag_oplata_1'] == '1')
                  {
                       return  '<div id="accert">Подтвержден</div>';
                  }else{
                      $ret = "<a  data-user_id='{$model['id']}'  class='btn btn-xs btn-primary btnPay'> Подтвердить</a>";
                      return $ret;
                  }

                    }
                ]

            ],
        ]); ?>
        <?php \yii\widgets\Pjax::end(); ?>
    </div>

<!-- Modal -->
<div class="modal fade"  data-show="false"  id="modalPay">
    <div class="modal-dialog" style="width: 95%; max-width: 500px;">
        <div class="modal-content panel panel-red">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title">Произвести подтверждение пользователя </h4>
            </div>
            <div class="modal-body">
                <form action="" id="formPay" class="form-horizontal">
                    <div class="form-group">
                        <div class="text-center">Будет выставлена оплата данному пользователю</div>
                        <div class="col-sm-12">
                            <input value="" type="hidden" name="user_id">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer panel-footer">
                <button type="button" class="btn btn-success" onclick="javascript:$('#formPay').submit(); return false;">Оплатить</button>
            </div>
        </div>
    </div>
</div>
<?php

//\common\Core::dump($provider->getModels());



