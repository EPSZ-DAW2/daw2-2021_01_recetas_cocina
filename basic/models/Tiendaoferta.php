<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tienda_ofertas".
 *
 * @property int $id
 * @property int $tienda_id
 * @property int $ingrediente_id
 * @property string|null $descripcion
 * @property string|null $envase
 * @property float $cantidad
 * @property string|null $medida
 * @property string|null $notas
 */
class Tiendaoferta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tienda_ofertas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tienda_id', 'ingrediente_id'], 'required'],
            [['tienda_id', 'ingrediente_id'], 'integer'],
            [['descripcion', 'envase', 'notas'], 'string'],
            [['cantidad'], 'number'],
            [['medida'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tienda_id' => Yii::t('app', 'Tienda ID'),
            'ingrediente_id' => Yii::t('app', 'Ingrediente ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'envase' => Yii::t('app', 'Envase'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'medida' => Yii::t('app', 'Medida'),
            'notas' => Yii::t('app', 'Notas'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TiendaofertaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TiendaofertaQuery(get_called_class());
    }

    
}
