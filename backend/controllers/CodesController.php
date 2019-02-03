<?php
namespace backend\controllers;


use common\Core;
use common\models\Code;

/**
 * Site controller
 */
class CodesController extends BaseController
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $Code = new Code();
        $config = $_GET;
        $provider = $Code->search($config);
        return $this->render('index', [
            'provider' => $provider
        ]);
    }

    public function actionEdit()
    {
        $Code = new Code();
        $Code->attributes = $_GET ?? null;
        $Code->get();
        $type_lst = $Code->typeLst();
        return $this->render('edit', [
            'type_lst'=>$type_lst,
            'Code' => $Code
        ]);
    }

    public function actionSave()
    {
        $Code = new Code();
        $Code->attributes = $_POST;
        $Code->save();
        Core::error($Code);

        $ar = [];
        if (Core::hasError()===false) $ar['success_txt'] = 'Запись успешно сохранена';
        Core::encode_echo($ar);
    }
}
