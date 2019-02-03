<?php
namespace backend\models;

use common\Core;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $pw
 * @property string $email
 */
class AdminUser extends ActiveRecord implements IdentityInterface
{

    public $auth_key;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%admin_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['email' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        return null;
//        if (!static::isPasswordResetTokenValid($token)) {
//            return null;
//        }
//
//        return static::findOne([
//            'password_reset_token' => $token,
//            'status' => self::STATUS_ACTIVE,
//        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        return false;
//        if (empty($token)) {
//            return false;
//        }
//
//        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
//        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
//        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $password == $this->pw;
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->pw = $password;
    }

    public function login()
    {

        if ($this->email == '') $this->addError('email', 'Email не заполнен');
        if ($this->pw == '') $this->addError('pw', 'Пароль не заполнен');

        if ($this->hasErrors() == true) return;


        $sql = "Select * from admin_user where email=:email";
        $row = \yii::$app->db->createCommand($sql, ['email'=>$this->email])->queryOne();
        if ($row['pw'] != $this->pw) $this->addError('pw', 'Не верный пароль');

        if ($this->hasErrors() == true) return;

        $id = $row['id'];


        $user = self::findIdentity($id);

        if ($user != null) {
            $x = 3600 * 24 * 30;
            \Yii::$app->user->login($user, $x);
        }

    }
}
