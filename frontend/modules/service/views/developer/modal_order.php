<?php
/**
 * Created by PhpStorm.
 * User: nikki
 * Date: 06.03.2019
 * Time: 21:45
 */
?>
<!-- Modal -->
<div class="modal fade" data-show="false" id="modalOrderService">
    <div class="modal-dialog" style="width: 95%; max-width: 500px;">
        <div class="modal-content panel panel-red">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title">Создать </h4>
            </div>
            <div class="modal-body">
                <p>Остатьте свои контакты, позднее, вам перезвонит менеджер для уточнения всех деталей заказа</p>
                <form action="" id="formOrderService" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input value="" type="text" class="form-control" id="fio" name="fio"
                                   placeholder="fio">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input value="" type="text" class="form-control" id="email" name="email"
                                   placeholder="Email">
                        </div>
                    </div>

                    <input type="hidden" id="t" name="t" />
                    <input type="hidden" id="product" name="product" />
                </form>
            </div>
                <button type="button" class="btn btn-blue" onclick="javascript:$('#formOrderService').submit(); return false;">Отправить</button>
        </div>
    </div>
</div>

