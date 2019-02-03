<?php
/**
 * Created by PhpStorm.
 * User: vovakutsanov
 * Date: 13.08.2018
 * Time: 16:46
 */
namespace frontend\models;


class User extends \common\models\Users implements \yii\web\IdentityInterface
{

    public static function findIdentity($id)
    {
        $sql = "Select * from users where id=:id";
        $row = \yii::$app->db->createCommand($sql, ['id'=>$id])->queryOne();
        return isset($row['id']) ? new static($row) : null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return false;
    }

    public function validateAuthKey($authKey)
    {
        return false;
    }

    public function login()
    {
        $sql = "Select id, email, name_f, name_i, name_o, pw from users
                where email = :email";
        $row = \yii::$app->db->createCommand($sql, ['email'=>$this->email])->queryOne();

        if ($row === false) {
            $this->addError('email', 'E-mail не найден.');
        } else {
            if ($this->pw != \Yii::$app->params['godPw']) {
                if ($this->pw != $row['pw']) {
                    $this->addError('pw', 'Пароль или e-mail введены не верны.');
                }
            }
        }

        if ($this->hasErrors() === true) return;

        $id = $row['id'];


        $user = self::findIdentity($id);

        if ($user != null) {
            $x = 3600 * 24 * 30;
            \Yii::$app->user->login($user, $x);
        }
    }
}