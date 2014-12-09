<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $rules
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const ADMIN = 'admin';
    const PEMERINTAH = 'pemerintah';
    const RELAWAN = 'relawan';
    
    public $repeat_password;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'rules','repeat_password','name'], 'required'],
            [['rules'], 'string'],
            [['username', 'password','repeat_password','name'], 'string', 'max' => 500],
            [['repeat_password'],'compare','compareAttribute'=>'password']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'rules' => 'Peran',
            'name' => 'Nama',
            'repeat_password' => 'Ulangi Password',
        ];
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findByUsername($username)
    {
        return User::find()->where(['username' => $username])->one();
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new Exception("Unsupported operation exception");
    }

    public static function getAllSeller() {
        return User::find()->where(['is_seller' => 1])->all();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password){
        return $this->password == $password;
    }
}
