<?php

/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 10.08.2018
 * Time: 15:10
 */

/* @var $this \yii\web\View */

$this->registerJs("CodeCtrl.actionEdit();", \yii\web\View::POS_END, 'actionEdit');
?>
<h2 class="pb-5 pt-5 text-center"> Добавление нового кода </h2>
<div class="row">
    <form action="" id="formSave" method="post">
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                $data = \yii\helpers\ArrayHelper::map($type_lst, 'id', 'name');
                $opt = [];
                $opt['class'] = 'form-control';
                $opt['prompt'] = 'Выберите тип';
                echo \yii\helpers\Html::dropDownList('type_id', $Code->type_id, $data, $opt);
                ?>
            </div>

        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" name="code" placeholder="Введите код" value="<?=$Code->code;?>">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="text" class="form-control" name="note" placeholder="Введите примечание" value="<?=$Code->note;?>">
            </div>
        </div>
        <input type="hidden" id="id" name="id" value="<?=$Code->id; ?>" />

        <div class="col-sm-12 text-center"> <button class="btn btn-success" onclick="javascript:$('#formSave').submit(); return false;"> Сохранить</button></div>
    </form>
</div>
