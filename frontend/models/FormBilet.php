<?php
/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 21.08.2018
 * Time: 15:04
 */

namespace frontend\models;


use common\Core;
use common\models\Users;
use kartik\mpdf\Pdf;
use yii\base\Controller;
use yii\base\Model;

class FormBilet extends Model
{
    private $_dir;

    public function init()
    {
        $this->_dir = \Yii::getAlias("@frontend/runtime/pdf");
        if (!is_dir($this->_dir)) mkdir($this->_dir);
        parent::init();
    }

    public function getDir(Users $Users)
    {
        return $this->_dir.'/bilet_'.$Users->id.'.pdf';
    }

    public function create(Users $Users)
    {
        $Controller = new Controller('controller', null);
        $path = \Yii::getAlias('@frontend') . '/views/cabinet/bilet_print.php';
        $content = $Controller->renderFile($path, ['Users' => $Users]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_FILE,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@frontend/web/css/print.css',
            // any css to be embedded if required
            //'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Билет'],
            'filename' => $this->getDir($Users),
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['Билет'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    public function dLoad(Users $Users)
    {
        $this->create($Users);
        $fName = $this->getDir($Users);

        Core::downLoad($fName,'bilet.pdf', 'pdf');


    }

}