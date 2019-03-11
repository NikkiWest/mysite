<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 07.03.2019
 * Time: 11:16
 */

return '
<div class="modal fade" id="modalOrderService">
    <div class="modal-dialog" style="width: 95%; max-width: 500px;">
        <div class="modal-content panel panel-red">
            <div class="modal-header panel-heading">
                <h4 class="modal-title" id="title">Оставить заявку</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">Заполните Ф.И.О и оставьте контактные данные, наши менеджеры свяжутся с вами в
                    ближайшее время!</p>
                <form action="" id="formOrderService" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input value="" type="text" class="form-control" id="fio" name="fio"
                                   placeholder="Ф.И.О">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input value="" type="text" class="form-control" id="phone" name="phone"
                                   placeholder="8(999)999-99-99">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input value="" type="text" class="form-control" id="email" name="email"
                                   placeholder="Email">
                        </div>
                    </div>

                    <input type="hidden" id="t" name="t"/>
                    <input type="hidden" id="service" name="service"/>
                </form>
            </div>
            <div class="modal-footer panel-footer">
                <button type="button" class="btn btn-blue" onclick="javascript:$(\'#formOrderService\').submit(); return false;">Отправить заявку</button>
            </div>
        </div>
    </div>
</div>';


