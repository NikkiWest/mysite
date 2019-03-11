<?php
/**
 * Created by PhpStorm.
 * User: Coder
 * Date: 06.03.2019
 * Time: 14:11
 */

?>
<div class="developer_web mt-5">
    <div class="title mb-5 ">Обслуживание сайтов</div>
    <div class="desc">Если для вашей компании надо что-то ежемесячно делать, то вам надо обслуживаться у нас
        <div class="title mb-5 mt-5 ">Подберите для себя тариф с помощью калькулятора</div>

        <div class="calculator">
            <div class="showSelect">
                <div class="title">Укажите пункты, необходимые для Вас</div>
                <div class="checkbox-container">

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="range_programming__block">
                                <label for="range_programming">Количество задач по <span>программированию</span> </label>
                                <input type="range" class="custom-range" min="0" max="50" step="1" id="range_programming">
                                <div class="d-flex justify-content-center mt-3 mb-3">
                                    <input type="text" class="form-control" value="" id="input_programming" style="width: 50px">
                                </div>
                            </div>

                            <div class="range_programming__block">
                                <label for="range_programming">Количество работ по <span>дизайну</span> </label>
                                <input type="range" class="custom-range" min="0" max="50" step="1" id="range_programming">
                                <div class="d-flex justify-content-center mt-3 mb-3">
                                    <input type="text" class="form-control" value="" id="input_programming" style="width: 50px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Ежемесячное наполнение новостями
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Дизайнерские работы
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Программирование
                        </label>
                    </div>
                </div>
            </div>
        </div>
</div>
