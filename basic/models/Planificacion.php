<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "planificaciones".
 *
 * @property int $id
 * @property string $nombre
 * @property string $periodo Texto indicativo del Periodo de planificacion.
 * @property int $usuario_id Usuario que ha creado la planificacion o CERO si no existe (como si fuera NULL).
 * @property string|null $notas
 */
class Planificacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planificaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'periodo', 'usuario_id'], 'required'],
            [['usuario_id'], 'integer'],
            [['notas'], 'string'],
            [['nombre'], 'string', 'max' => 45],
            [['periodo'], 'string', 'max' => 25],
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
            'periodo' => Yii::t('app', 'Periodo'),
            'usuario_id' => Yii::t('app', 'Usuario ID'),
            'notas' => Yii::t('app', 'Notas'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return PlanificacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PlanificacionQuery(get_called_class());
    }

    public static function esPropiedad($idu)
    {
        
        if(isset($_GET["id"]))
        {
            $idp=$_GET["id"];


            if (Planificacion::findOne(['id' => $idp,'usuario_id' => $idu])){
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

    public static function esPropiedadPlanificacionMenu($idu)
    {
        if(isset($_GET["id"]))
        {
            $idPlanifiMenu=$_GET["id"];

            $idp=PlanificacionMenu::find()->select(['planificacion_id'])->where(['id'=>$idPlanifiMenu])->one();
            
            if (Planificacion::findOne(['id' => $idp,'usuario_id' => $idu])){
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
