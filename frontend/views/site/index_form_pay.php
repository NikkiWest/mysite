<?php
/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 14.08.2018
 * Time: 23:15
 */

?>




<div class="modal fade " id="modalPay">
    <div class="modal-dialog" style="width: 95%; max-width: 700px;">
        <div class="modal-content panel panel-red">
            <div class="modal-header panel-heading ">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class=" text-center textforModalPayOk   mb-2" style="    margin-top: -30px;"> Ваша заявка на участие зарегистрирована!</div>

                <div class="text-center mt-4 mb-4 f18"> В течение дня с вами свяжется администратор конференции для подтверждения заявки.</div>

                <div class="text-center mb-3">
                    <a href="/" class="btn btn-reg"> &#8195;&#8195;ОК&#8195;&#8195;</a>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php /*
<!-- Modal -->
<!--<div class="modal fade " id="modalPay">-->
<!--    <div class="modal-dialog" style="width: 95%; max-width: 700px;">-->
<!--        <div class="modal-content panel panel-red">-->
<!--            <div class="modal-header panel-heading ">-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span-->
<!--                            aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <div class="textforModalPayOk text-center  mb-2"> Вы успешно зарегистрировались!</div>-->
<!--                <div class="text-center" id="divCost">К оплате <span>--><?//= $Users->sum_rub; ?><!--</span> р.-->
<!--                </div>-->
<!--                <div class="d-flex align-items-center justify-content-center">-->
<!--                    <div class="pr-5">У меня есть промо-код</div>-->
<!--                    <div><input value="--><?//= $Users->code; ?><!--" type="text"-->
<!--                                class="form-control d-inline text-center" id="promo-code"-->
<!---->
<!--                        ></div>-->
<!--                </div>-->
<!---->
<!---->
<!--                <div id="divPayAll">-->
<!---->
<!---->
<!--                    <div class="text-center mt-3 mb-4">-->
<!--                        <div class="btn btn-link btnSelectTypeOplata active ff" data-t="fl">Оплатить как физическое-->
<!--                            лицо-->
<!--                        </div>-->
<!--                        <div class="btn btn-link btnSelectTypeOplata ff" data-t="ul">Оплатить как юридическое лицо-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!---->
<!--                    <div id="div-ul" class="divPaySection d-none">-->
<!--                        <form action="" id="formPay" class="form-horizontal">-->
<!---->
<!--                            <div class="row form-group">-->
<!---->
<!--                                    <div class="col-sm-6">-->
<!--                                        <input value="--><?//= $Rekvizit->inn; ?><!--" type="text" class="form-control" id="inn"-->
<!--                                               name="inn"-->
<!--                                               placeholder="ИНН">-->
<!---->
<!--                                </div>-->
<!---->
<!---->
<!--                                    <div class="col-sm-6">-->
<!--                                        <input value="--><?//= $Rekvizit->kpp; ?><!--" type="text" class="form-control" id="kpp"-->
<!--                                               name="kpp"-->
<!--                                               placeholder="КПП">-->
<!--                                    </div>-->
<!---->
<!--                            </div>-->
<!---->
<!---->
<!--                            <div class="row form-group">-->
<!--                                <div class="col-sm-12">-->
<!--                                    <input value="--><?//= $Rekvizit->name; ?><!--" type="text" class="form-control"-->
<!--                                           id="name"-->
<!--                                           name="name" placeholder="Наименование организации">-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="row form-group">-->
<!--                                <div class="col-sm-6">-->
<!--                                    <input value="--><?//= $Rekvizit->add_ur; ?><!--" type="text" class="form-control"-->
<!--                                           id="add_ur"-->
<!--                                           name="add_ur" placeholder="Юридический адрес ">-->
<!--                                </div>-->
<!--                                <div class="col-sm-6">-->
<!--                                    <input value="--><?//= $Rekvizit->add_post; ?><!--" type="text" class="form-control"-->
<!--                                           id="add_post"-->
<!--                                           name="add_post" placeholder="Почтовый адрес ">-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="row form-group">-->
<!--                                <div class="col-sm-8">-->
<!--                                    <input value="--><?//= $Rekvizit->bank_name; ?><!--" type="text" class="form-control"-->
<!--                                           id="bank_name"-->
<!--                                           name="bank_name" placeholder="Наименование банка ">-->
<!--                                </div>-->
<!--                                <div class="col-sm-4">-->
<!--                                    <input value="--><?//= $Rekvizit->bik; ?><!--" type="text" class="form-control" id="bik"-->
<!--                                           name="bik"-->
<!--                                           placeholder="БИК">-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="row form-group">-->
<!--                                <div class="col-sm-6">-->
<!--                                    <input value="--><?//= $Rekvizit->rs; ?><!--" type="text" class="form-control" id="rs"-->
<!--                                           name="rs"-->
<!--                                           placeholder="Расчетный счет ">-->
<!--                                </div>-->
<!--                                <div class="col-sm-6">-->
<!--                                    <input value="--><?//= $Rekvizit->ks; ?><!--" type="text" class="form-control" id="ks"-->
<!--                                           name="ks"-->
<!--                                           placeholder="Кореспондентный счет">-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <input type="hidden" id="id" name="id" value="--><?//= $Rekvizit->id; ?><!--"/>-->
<!--                            <input type="hidden" id="invoice_id" name="invoice_id" value="--><?//= $Invoice->id; ?><!--"/>-->
<!--                            <input type="hidden" name="code" value=""/>-->
<!--                        </form>-->
<!---->
<!--                        <div class="text-center mb-3 mt-5">-->
<!--                            <button type="button" class="btn btn-reg"-->
<!--                                    onclick="javascript:$('#formPay').submit(); return false;">-->
<!--                                Скачать счет-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div id="div-fl" class="divPaySection">-->
<!--                        <div class="text-center mt-5 mb-4">-->
<!--                            <button type="button" class="btn btn-reg"-->
<!--                                    onclick="javascript:$('#formPayCard').submit(); return false;">-->
<!--                                Яндекс.Касса-->
<!--                            </button>-->
<!--                        </div>-->
<!---->
<!--                        <form id="formPayCard">-->
<!---->
<!--                        </form>-->
<!--                        <form id="formPayCardGoPay" action="https://pharmznanie.ru/pay/pay" method="post">-->
<!--                            <input type="hidden" name="sum" value=""/>-->
<!--                            <input type="hidden" name="name" value=""/>-->
<!--                            <input type="hidden" name="code" value=""/>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


 */ ?>