<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $email Correo Electronico y "login" del usuario.
 * @property string $password
 * @property string $nombre
 * @property string $rol Tipo de Perfil: C=Colaborador, A=Administrador, T=Tienda.
 * @property int $aceptado Indicador de usuario aceptado su registro o no.
 * @property string $creado Fecha y Hora de creacion del usuario
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'nombre'], 'required'],
            [['aceptado'], 'integer'],
            [['creado'], 'safe'],
            [['email'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 60],
            [['nombre'], 'string', 'max' => 45],
            [['rol'], 'string', 'max' => 1],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'nombre' => Yii::t('app', 'Nombre'),
            'rol' => Yii::t('app', 'Rol'),
            'aceptado' => Yii::t('app', 'Aceptado'),
            'creado' => Yii::t('app', 'Creado'),
        ];
    }

    public function getAuthKey()
    {
        //return null;
        throw new \yii\base\NotSupportedException("No existe");
    }

    public function getId()
    {
        return $this->id;
    }
    public function getPass()
    {
        return $this->password;
    }

    public function validateAuthKey($authKey)
    {
        throw new \yii\base\NotSupportedException("No existe");
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }



    public static function findIdentityByAccessToken($token, $type=null)
    {
       throw new \yii\base\NotSupportedException("No existe");
    }

    public static function findByUsername($nombre)
    {
/*         foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null; */
         $user = self::find()->where(['nombre' => $nombre])->one();

        return $user; 
           
    
                /*
                $user = self::find()
                ->where([
                    "username" => $username
                ])
                ->one();
        if (!count($user)) {
            return null;
        } */
        //$user = self::find()->where(['username' => $username])->one();
        //return new static($user);
       // var_dump(self::findOne(1));
        //return self::findOne(['username'=>$username]);

       // return self::findOne(1);
    }



 
 
    public function validatePassword($password)
    {
        //return $this->$password === $password;
        //return password_verify($password,$this->password);
        return $this->password === hash("sha1", $password);
       // return \Yii::$app->security->validatePassword($password,$this->password);
    }
    /**
     * {@inheritdoc}
     * @return UsuarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuarioQuery(get_called_class());
    }

    //public $rol;

    public static function esUsuarioColaborador($id)
    {
       if (Usuario::findOne(['id' => $id, 'aceptado' => '1', 'rol' => "C"])){
       return true;
       } else {

       return false;
       }
    }
    public static function esUsuarioAdministrador($id)
    {
       if (Usuario::findOne(['id' => $id, 'aceptado' => '1', 'rol' => "A"])){
        return true;
       } else {

        return false;
       }

    }

    public static function esUsuarioTienda($id)
    {
       if (Usuario::findOne(['id' => $id, 'aceptado' => '1', 'rol' => "T"])){
        return true;
       } else {

        return false;
       }

    }

    

    public static function esUsuarioSistema($id)
    {
       if (Usuario::findOne(['id' => $id, 'aceptado' => '1', 'rol' => "S"])){
        return true;
       } else {

        return false;
       }

    }




}
