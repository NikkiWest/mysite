<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 09.08.16
 * Time: 9:43
 */

namespace common;


use common\helpers\numToText\ManyToText;
use yii\base\Model;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Imagine\Image\Point;
use yii\imagine\Image;


class Core
{
    static function init()
    {
        if (!isset(\yii::$app->params['error'])) \yii::$app->params['error'] = [];
        if (!isset(\yii::$app->params['success_txt'])) \yii::$app->params['success_txt'] = [];
        if (!isset(\yii::$app->params['info'])) \yii::$app->params['info'] = [];
        if (!isset(\yii::$app->params['errorFld'])) \yii::$app->params['errorFld'] = [];
        if (!isset(\yii::$app->params['debug'])) \yii::$app->params['debug'] = [];
    }

    static $month = array(
        'title' => 'месяц',
        'data' => array(
            1 => array('title' => 'январь', 'short' => 'янв', 'title_rod' => 'января', 'id' => 1)
        , 2 => array('title' => 'февраль', 'short' => 'фев', 'title_rod' => 'февраля', 'id' => 2)
        , 3 => array('title' => 'март', 'short' => 'мар', 'title_rod' => 'марта', 'id' => 3)
        , 4 => array('title' => 'апрель', 'short' => 'апр', 'title_rod' => 'апреля', 'id' => 4)
        , 5 => array('title' => 'май', 'short' => 'май', 'title_rod' => 'мая', 'id' => 5)
        , 6 => array('title' => 'июнь', 'short' => 'июн', 'title_rod' => 'июня', 'id' => 6)
        , 7 => array('title' => 'июль', 'short' => 'июл', 'title_rod' => 'июля', 'id' => 7)
        , 8 => array('title' => 'август', 'short' => 'авг', 'title_rod' => 'августа', 'id' => 8)
        , 9 => array('title' => 'сентябрь', 'short' => 'сен', 'title_rod' => 'сентября', 'id' => 9)
        , 10 => array('title' => 'октябрь', 'short' => 'окт', 'title_rod' => 'октября', 'id' => 10)
        , 11 => array('title' => 'ноябрь', 'short' => 'ноя', 'title_rod' => 'ноября', 'id' => 11)
        , 12 => array('title' => 'декабрь', 'short' => 'дек', 'title_rod' => 'декабря', 'id' => 12)
        )
    );

    public static function dump($var, $depth = 10, $highlight = true, $echo = true)
    {
        $vard = new \yii\helpers\VarDumper;

        if ($echo === true) {
            echo $vard->dumpAsString($var, $depth, $highlight);
        } else
            return $vard->dumpAsString($var, $depth, $highlight);
    }

    static function encode($ar = array(), $with_debug = false)
    {
        self::init();
        $error = \yii::$app->params['error'];
        $info = \yii::$app->params['info'];
        $success_txt = \yii::$app->params['success_txt'];
        $errorFld = \yii::$app->params['errorFld'];
        $debug = \yii::$app->params['debug'];
        if (!isset($ar['success']))
            $ar['success'] = true;

        if (count($error) > 0) {
            $ar['error'] = implode('<br />', (array) $error);
            $ar['errorFld'] = $errorFld;
            $ar['success'] = false;
        }

        if (count($info) > 0) {
            $ar['info'] = implode('<br />', (array) $info);
        }
        if (count($success_txt) > 0) {
            $ar['success_txt'] = implode('<br />', (array) $success_txt);
        }

        if ($with_debug === true) {
            $dbStats = Yii::getLogger()->getLogs('profile');
            $ar['debug'] = Core::dump($debug, 10, true, false);
            $ar['debug'] .= '<br /><br />SQL:';
            foreach ($dbStats as $item) {
                $ar['debug'] .= '<br />' . $item[0];
            }
        }

        $js = \yii\helpers\Json::encode($ar);
        return $js;
    }


    static function encode_echo($ar = array(), $with_debug = false)
    {
        if (headers_sent($f, $l))
        {
            var_export([$f, $l]);
            var_export(headers_list());
            exit;
        }

        $str = self::encode($ar, $with_debug);
        header('Content-Type: application/json');
        echo $str;
	exit;
        //\yii::$app->end();
    }




    /**
     * пишем текст в массив ошибок
     * @param type $str
     */
    static function error($str, $fldName = null)
    {
        self::init();
        if ($str instanceof Model) {
            $class = get_class($str);
            $tmp = explode('\\', $class);
            $class_name = $tmp[count($tmp)-1];
            if ($str->errors) {
                foreach ($str->errors as $fld => $errors) {
                    foreach ($errors as $error) {
                        $ar = \yii::$app->params['error'];
                        $ar[] = $error;
                        \yii::$app->params['error'] = $ar;
                    }
                    $ar = \yii::$app->params['errorFld'];
                    $ar[] = $fld;
                    $ar[] = $class_name.'-'.$fld;
                    \yii::$app->params['errorFld'] = $ar;
                }
            }
            return;
        }

        if (is_array($str)) {
            foreach ($str as $key => $val) {
                if (is_array($val)) {
                    foreach ($val as $k => $v) {
                        $ar = \yii::$app->params['error'];
                        $ar[] = $v;
                        \yii::$app->params['error'] = $ar;
                        $ar = \yii::$app->params['errorFld'];
                        $ar[] = $key;
                        \yii::$app->params['errorFld'] = $ar;
                    }
                } else {
                    $ar = \yii::$app->params['error'];
                    $ar[] = $val;
                    \yii::$app->params['error'] = $ar;
                    $ar = \yii::$app->params['errorFld'];
                    $ar[] = $key;
                    \yii::$app->params['errorFld'] = $ar;
                }
            }
            return;
        }

        $ar = \yii::$app->params['error'];
        $ar[] = $str;
        \yii::$app->params['error'] = $ar;
        if ($fldName !== null) {
            $ar = \yii::$app->params['errorFld'];
            $ar[] = $fldName;
            \yii::$app->params['errorFld'] = $ar;
        }
    }

    static function info($str)
    {
        self::init();
        $ar = \yii::$app->params['info'];
        $ar[] = $str;
        \yii::$app->params['info'] = $ar;
    }

    static function success_txt($str)
    {
        self::init();
        $ar = \yii::$app->params['success_txt'];
        $ar[] = $str;
        \yii::$app->params['success_txt'] = $ar;
    }

    /**
     * пишем текст в файл
     * @param type $str
     */
    static function errorSystem($str)
    {
        $fname = YiiBase::getPathOfAlias('application') . '/runtime/err.txt';
        $h = fopen($fname, "a");
        $dt = date('d.m.Y H:i:s') . '/' . rand(10, 99);
        $text = $dt . ' - ' . $_SERVER["REQUEST_URI"] . "\n" . $str . "\n\n";
        self::error('Ошибка системы<br />идентификатор ошибки - ' . $dt);
        if (fwrite($h, $text))
            fclose($h);
    }

    static function hasError()
    {
        self::init();
        if (count(\yii::$app->params['error']) == 0)
            return false;
        return true;
    }

    static function viewError($sep = '<br />', $clearEr = true)
    {
        self::init();
        $errors = \yii::$app->params['error'];
        if (!is_array($errors))
            return;
        $str = '';
        foreach ($errors as $er) {
            if ($str != '')
                $str .= $sep;
            $str .= $er;
        }
        if ($clearEr === true) {
            \yii::$app->params['error'] = array();
        }
        return $str;
    }




    static function img($pathUrl = '', $razmer, $watermark = null, $attribute = ['align' => 'absmiddle'])
    {
        $format = '';

        if (is_array($razmer)) {
            $width = $razmer[0];
            $height = $razmer[1];
        } else {
            $tmp = \Yii::$app->params['img']['all']['razmer'][$razmer];
            if (!$tmp) return;
            $width = $tmp[0];
            $height = $tmp[1];
            $format = $tmp['format'] ?? null;
        }
        $ar = ['full_in'];
        if (!in_array($format, $ar)) $format = null;


        $path = \Yii::getAlias('@storage') . $pathUrl;

        $fName = basename($path);



        try {
            if (!is_file($path)) {
                $dir = dirname($path) . '/../src';
                if (is_file($dir . '/' . $fName)) {

                    $Image = new Image();

                    $image = $Image::getImagine()->open($dir . '/' . $fName, ImageInterface::FILTER_LANCZOS);

                    $size = $image->getSize();

                    $w = $size->getWidth();
                    $h = $size->getHeight();


                    if ($format == 'full_in') {
                        $k_w = $w / $width;
                        $k_h = $h / $height;
                        $k = ($k_w < $k_h) ? $k_h : $k_w;

                        $resize_w = round($w/$k);
                        $resize_h = round($h/$k);

                        if ($width > $resize_w) $width = $resize_w;
                        if ($height > $resize_h) $height = $resize_h;

                        $crop_w = $resize_w - $width;
                        $crop_w = ($crop_w > 0) ? round($crop_w/2) : 0;
                        $crop_h = $resize_h - $height;
                        $crop_h = ($crop_h > 0) ? round($crop_h/2) : 0;
                    } else {
                        $k_w = $w / $width;
                        $k_h = $h / $height;
                        $k = ($k_w > $k_h) ? $k_h : $k_w;

                        $resize_w = round($w/$k);
                        $resize_h = round($h/$k);

                        $crop_w = $resize_w - $width;
                        $crop_w = ($crop_w > 0) ? round($crop_w/2) : 0;
                        $crop_h = $resize_h - $height;
                        $crop_h = ($crop_h > 0) ? round($crop_h/2) : 0;
                    }
                    $image->resize(new Box($resize_w, $resize_h))
                        ->crop(new Point($crop_w, $crop_h), new Box($width, $height))
                        ->save($path);

                }
            }
        } catch (Exception $exc) {
//            echo $exc->getTraceAsString();
        }

        if (is_file($path)) {
            $pathUrl = \Yii::getAlias('@storageUrl') . $pathUrl;
            $ret['img'] = '<img src="' . $pathUrl . '" width="' . $width . '" height="' . $height . '" />';
            $ret['url'] = $pathUrl;

        } else {
            $ret = false;
        }

        return $ret;
    }

    static function img_del($pathUrl)
    {
        $path = \Yii::getAlias('@storage') . $pathUrl;
        $tmp = explode('/', $path);
        $f_name = $tmp[count($tmp) - 1];

        $ar_dir = ['sm', 'md', 'lg', 'src'];
        foreach ($ar_dir as $dirName) {
            $dir = dirname($path) . '/../'.$dirName.'/';
            if (is_file($dir.$f_name)) unlink($dir.$f_name);
        }
    }


    public static function downLoad($path, $fileName, $fileType)
    {
        ob_start();
        ob_clean();
//        $content = file_get_contents($path);

        $fp = fopen($path, 'rb');

        switch ($fileType) {
            case 'tiff':
                $fileType_str = 'Content-type: image/tiff';
                break;

            case 'png':
                $fileType_str = 'Content-type: image/png';
                break;

            case 'gif':
                $fileType_str = 'Content-type: image/gif';
                break;

            case 'jpg':
            case 'jpeg':
                $fileType_str = 'Content-type: image/jpeg';
                break;

            case 'xml':
                $fileType_str = 'Content-type: plaintext/xml';
                break;

            case 'rtf':
                $fileType_str = 'Content-type: plaintext/rtf';
                break;

            case 'docx':
                $fileType_str = 'Content-type: application/octet-stream';
                break;

            case 'pdf':
                $fileType_str = 'Content-type: application/pdf';
                break;

            case 'zip':
                $fileType_str = 'Content-type: application/zip';
                break;

            default:
                $fileType_str = 'Content-type: plaintext/octet-stream';
                break;
        }

        if ($fileType == 'docx') {
            header('Content-Description: File Transfer');
            header(
                'Content-Type: application/vnd.openxmlformats-officedocument.' .
                'wordprocessingml.document'
            );
            header(
                'Content-Disposition: attachment; filename="' . $fileName . '"'
            );
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');

//            header('Content-Length: ' . strlen($content));
//            echo $content;

            header('Content-Length: ' . filesize($path));
            fpassthru($fp);

            \Yii::$app->end();
        }

        $fileName = str_replace(',','-',$fileName);

        header($fileType_str);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=$fileName");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
//        header('Content-Length: ' . strlen($content));
//        echo $content;

        header('Content-Length: ' . filesize($path));
        fpassthru($fp);

        \Yii::$app->end();
    }

    static function ruToEn($str)
    {
        $pattern = array(
            'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И',
            'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С',
            'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ',
            'Ы', 'Ь', 'Э', 'Ю', 'Я',
            'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з',
            'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р',
            'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ',
            'ъ', 'ы', 'ь', 'э', 'ю', 'я',
            ' ');
        $replace = array(
            'A', 'B', 'V', 'G', 'D', 'E', 'J', 'Z', 'I',
            'I', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S',
            'T', 'U', 'F', 'KS', 'C', 'CH', 'SH', 'CH', '-',
            'A', '-', 'E', 'YO', 'YA',
            'a', 'b', 'v', 'g', 'd', 'e', 'j', 'z', 'i',
            'i', 'i', 'k', 'l', 'm', 'n', 'o', 'p', 'r',
            's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'ch', '-',
            'a', '-', 'e', 'yo', 'ya',
            '-'
        );
        $str = str_replace('З', 'Z', $str);
        $str = str_replace('з', 'z', $str);
        $str = str_replace($pattern, $replace, $str);
        return $str;
    }

    static function dt_diff ($date_from, $date_till) {
        $date_from = explode('-', $date_from);
        $date_till = explode('-', $date_till);

        $time_from = mktime(0, 0, 0, $date_from[1], $date_from[2], $date_from[0]);
        $time_till = mktime(0, 0, 0, $date_till[1], $date_till[2], $date_till[0]);

        $diff = ($time_till - $time_from)/60/60/24;
        //$diff = date('d', $diff); - как делал))

        return $diff;
    }

    static function ManyToText()
    {
        return new ManyToText();
    }


}

