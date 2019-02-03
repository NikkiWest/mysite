<?php
namespace frontend\controllers;

use common\Core;
use common\models\Code;
use common\models\Invoice;
use common\models\Users;
use frontend\models\FormBilet;
use frontend\models\FormInvoice;
use frontend\models\FormPay;
use frontend\models\User;
use kartik\mpdf\Pdf;
use yii\web\Controller;
use common\models\LoginForm;

/**
 * Site controller
 */
class CabinetController extends Controller
{
    public function beforeAction($action)
    {
        $user_id = \Yii::$app->user->id ?? null;

        if ($user_id == null) {
            $this->redirect('/');
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionInvoiceSave()
    {
        $code = $_POST['code'] ?? null;
        if ($code != '') {
            $FormPay = new FormPay();
            $FormPay->saveCode($code);
        }

        $FormInvoice = new FormInvoice();
        $FormInvoice->attributes = $_POST;
        $FormInvoice->create();
        Core::error($FormInvoice);
        $ar = [];
        if (Core::hasError()===false) {
            $ar['success_txt'] = 'Счет успешно сохранен';
            $ar['invoice_id'] = $FormInvoice->invoice_id;
        }
        Core::encode_echo($ar);
    }

    public function actionPay()
    {
        $code = $_POST['code'] ?? null;
        $FormPay = new FormPay();
        if ($code != '') {
            $FormPay->saveCode($code);
        }

        $ar['sum'] = $FormPay->getCost();
        $ar['name'] = $FormPay->getName();
        Core::encode_echo($ar);
    }

    public function actionInvoiceDLoad()
    {
        $invoice = new Invoice();
        $invoice->id = $_GET['id'];
        $invoice->get();


        $content = $this->renderPartial('invoice_print', ['invoice' => $invoice]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@frontend/web/css/print.css',
            // any css to be embedded if required
            //'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Счет'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['Счет'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();

    }


    public function actionBiletDLoad()
    {
        $Users = new Users();
        $Users->id = \Yii::$app->user->id;
        $Users->get();

        $FormBilet = new FormBilet();
        $FormBilet->dLoad($Users);


//        $content = $this->renderPartial('bilet_print', ['Users' => $Users]);
//
//        // setup kartik\mpdf\Pdf component
//        $pdf = new Pdf([
//            // set to use core fonts only
//            'mode' => Pdf::MODE_UTF8,
//            // A4 paper format
//            'format' => Pdf::FORMAT_A4,
//            // portrait orientation
//            'orientation' => Pdf::ORIENT_PORTRAIT,
//            // stream to browser inline
//            'destination' => Pdf::DEST_BROWSER,
//            // your html content input
//            'content' => $content,
//            // format content from your own css file if needed or use the
//            // enhanced bootstrap css built by Krajee for mPDF formatting
//            'cssFile' => '@frontend/web/css/print.css',
//            // any css to be embedded if required
//            //'cssInline' => '.kv-heading-1{font-size:18px}',
//            // set mPDF properties on the fly
//            'options' => ['title' => 'Билет'],
//            // call mPDF methods on the fly
//            'methods' => [
//                'SetHeader'=>['Билет'],
//                'SetFooter'=>['{PAGENO}'],
//            ]
//        ]);
//
//        // return the pdf output as per the destination setting
//        return $pdf->render();

    }
}
