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
class Copiadeseguridad extends \yii\db\ActiveRecord 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '*';
    }
  
    



}
