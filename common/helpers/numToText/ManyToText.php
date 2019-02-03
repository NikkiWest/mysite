<?php
/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 28.03.17
 * Time: 20:05
 */

namespace common\helpers\numToText;


class ManyToText extends NumToText
{
    public function __construct()
    {
        $this->SetMant(array('рубль', 'рубля', 'рублей'));
        $this->SetExpon(array('копейка', 'копейки', 'копеек'));
    }

}