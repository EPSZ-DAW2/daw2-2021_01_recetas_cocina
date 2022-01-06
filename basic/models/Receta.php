<?php

namespace app\models;

use phpDocumentor\Reflection\Types\True_;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "recetas".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string $tipo_plato Tipo Plato E=Entrantes, 1=Primeros, 2=Segundos, P=Postres, ...
 * @property int $dificultad 1=Muy Facil,5=Muy Dificil.
 * @property int $comensales Numero de comensales para la receta.
 * @property int $tiempo_elaboracion Tiempo en Minutos de elaboracion de la receta.
 * @property int $valoracion Valoracion de la receta: 1=Peor, 3=Buena, 5=Mejor.
 * @property int|null $usuario_id Usuario que ha creado la receta o CERO si no existe (como si fuera NULL).
 * @property int|null $aceptada Indicador de receta aceptada o no.
 */
class Receta extends ActiveRecord
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recetas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'tipo_plato'], 'required'],
            [['nombre', 'descripcion','imagen'], 'string'],

            [['dificultad', 'comensales', 'tiempo_elaboracion', 'valoracion', 'usuario_id', 'aceptada'], 'integer'],
            [['tipo_plato'], 'string', 'max' => 1],
            [['tipo_plato'], 'string', 'max' => 1],
            ['imageFile', 'file',

                'skipOnEmpty' => True,
                'uploadRequired' => 'No has seleccionado ningún archivo', //Error
                'maxSize' => 1024*1024*1, //1 MB
                'tooBig' => 'El tamaño máximo permitido es 1MB', //Error
                'minSize' => 10, //10 Bytes
                'tooSmall' => 'El tamaño mínimo permitido son 10 BYTES', //Error
                'extensions' => 'png, jpg',
                'wrongExtension' => 'El archivo {file} no contiene una extensión permitida {extensions}', //Error
                'tooMany' => 'El máximo de archivos permitidos son {limit}', //Error
                 ],
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
            'descripcion' => Yii::t('app', 'Descripcion'),
            'tipo_plato' => Yii::t('app', 'Tipo Plato'),
            'dificultad' => Yii::t('app', 'Dificultad'),
            'comensales' => Yii::t('app', 'Comensales'),
            'tiempo_elaboracion' => Yii::t('app', 'Tiempo Elaboracion'),
            'valoracion' => Yii::t('app', 'Valoracion'),
            'usuario_id' => Yii::t('app', 'Usuario ID'),
            'aceptada' => Yii::t('app', 'Aceptada'),
            'imagen' => Yii::t('app', 'Imagen'),
            'imageFile' => Yii::t('app', 'Subida de imagen de receta'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return recetaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new recetaQuery(get_called_class());
    }


}
