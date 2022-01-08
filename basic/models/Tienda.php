<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tiendas".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $domicilio
 * @property string|null $poblacion
 * @property string|null $provincia
 * @property int $usuario_id Usuario que se corresponde con la tienda para poder conectar a la aplicación web.
 * @property int $activa Si la tienda esta activa para conectar como usuario, y si estará visible desde el portal junto con sus ofertas independientemente de que esté visible o no.
 * @property int $visible Si la tienda y sus ofertas estarán visibles en el portal aunque esté la tienda activa.
 */
class Tienda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tiendas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'usuario_id', 'activa', 'visible'], 'required'],
            [['usuario_id', 'activa', 'visible'], 'integer'],
            [['nombre', 'domicilio'], 'string', 'max' => 150],
            [['poblacion', 'provincia'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'domicilio' => Yii::t('app', 'Domicilio'),
            'poblacion' => Yii::t('app', 'Poblacion'),
            'provincia' => Yii::t('app', 'Provincia'),
            'usuario_id' => Yii::t('app', 'Usuario ID'),
            'activa' => Yii::t('app', 'Activa'),
            'visible' => Yii::t('app', 'Visible'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TiendaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TiendaQuery(get_called_class());
    }

    public static function esPropiedad($idu)
    {
        
        if(isset($_GET["id"]))
        {
            $idt=$_GET["id"];

/*             $model=Tienda::find()->select(['id'])->where(['usuario_id'=>$idu])->one();
            var_dump($model);
            if ($model)
            { */
            if (Tienda::findOne(['id' => $idt,'usuario_id' => $idu])){
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

    public static function esPropiedadOferta($idu)
    {
        if(isset($_GET["id"]))
        {
            $idOferta=$_GET["id"];

            $idt=Tiendaoferta::find()->select(['tienda_id'])->where(['id'=>$idOferta])->one();
            
            if (Tienda::findOne(['id' => $idt,'usuario_id' => $idu])){
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

    /*public static function encontrarUsuarioOferta($idOferta,$idtienda)
    {
            //=Tiendaoferta::findOne(['id' => $idOferta]);
            //$modeloTienda=Tienda::findOne(['id' => $modeloOferta->tienda_id]);

            //$modeloOferta=Tiendaoferta::find()->select(['tienda_id'])->where(['id'=>$idOferta])->one();
            $modeloTienda=Tienda::find()->select(['usuario_id'])->where(['id'=>$idtienda1])->one();
            return $modeloTienda;
    } */

}
