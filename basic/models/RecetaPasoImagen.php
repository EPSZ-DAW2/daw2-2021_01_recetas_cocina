<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "receta_paso_imagenes".
 *
 * @property int $id
 * @property int $receta_paso_id
 * @property int $orden
 * @property string $imagen
 */
class RecetaPasoImagen extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'receta_paso_imagenes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['receta_paso_id'], 'required'],
            [['receta_paso_id', 'orden'], 'integer'],
            [['imagen'], 'string'],
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
            'id' => 'ID',
            'receta_paso_id' => 'Receta Paso ID',
            'orden' => 'Orden',
            'imagen' => 'Imagen',
            'imageFile' => Yii::t('app', 'Subida de imagen de receta'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return RecetaPasoImagenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RecetaPasoImagenQuery(get_called_class());
    }
}
