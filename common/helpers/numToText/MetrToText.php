<?php
/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 28.03.17
 * Time: 20:06
 */

namespace common\helpers\numToText;


class MetrToText extends NumToText
{
    public function __construct()
    {
        $this->SetMant(array('метр', 'метра', 'метров'));
        $this->SetExpon(array('сантиметр', 'сантиметра', 'сантиметров'));
    }

}