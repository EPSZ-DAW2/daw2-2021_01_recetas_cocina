<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menus".
 *
 * @property int $id
 * @property string $titulo
 * @property string $descripcion
 * @property int|null $usuario_id Usuario que ha creado el menu o CERO si no existe (como si fuera NULL).
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'descripcion'], 'required'],
            [['titulo', 'descripcion'], 'string'],
            [['usuario_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'usuario_id' => Yii::t('app', 'Usuario ID'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return MenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MenuQuery(get_called_class());
    }

    public static function esPropiedad($idu)
    {
        
        if(isset($_GET["id"]))
        {
            $idm=$_GET["id"];


            if (Menu::findOne(['id' => $idm,'usuario_id' => $idu])){
                return true;
               } else {
        
                return false;
               }
        }
        else
        {

            return true;
           
        }

    }
    public static function esPropiedadMenuReceta($idu)
    {
        if(isset($_GET["id"]))
        {
            $idMenuReceta=$_GET["id"];

            $idm=Menureceta::find()->select(['menu_id'])->where(['id'=>$idMenuReceta])->one();
            
            if (Menu::findOne(['id' => $idm,'usuario_id' => $idu])){
                return true;
               } else {
        
                return false;
               }
        }
        else
        {

            return true;
           
        }

    }
}
