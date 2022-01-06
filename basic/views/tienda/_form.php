<?php

use app\models\Usuario;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tienda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tienda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'poblacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provincia')->dropDownList([
            'A Coruña' => 'A Coruña',
            'Álava' => 'Álava',
            'Albacete' => 'Albacete',
            'Alicante' => 'Alicante',
            'Almería' => 'Almería',
            'Asturias' => 'Asturias',
            'Ávila' => 'Ávila',
            'Badajoz' => 'Badajoz',
            'Baleares' => 'Baleares',
            'Barcelona' => 'Barcelona',
            'Burgos' => 'Burgos',
            'Cáceres' => 'Cáceres',
            'Cádiz' => 'Cádiz',
            'Cantabria' => 'Cantabria',
            'Castellón' => 'Castellón',
            'Ciudad Real' => 'Ciudad Real',
            'Córdoba' => 'Córdoba',
            'Cuenca' => 'Cuenca',
            'Girona' => 'Girona',
            'Granada' => 'Granada',
            'Guadalajara' => 'Guadalajara',
            'Huelva' => 'Huelva',
            'Gipuzkoa' => 'Gipuzkoa',
            'Huesca' => 'Huesca',
            'Jaén' => 'Jaén',
            'La Rioja' => 'La Rioja',
            'Las Palmas' => 'Las Palmas',
            'León' => 'León',
            'Lérida' => 'Lérida',
            'Lugo' => 'Lugo',
            'Madrid' => 'Madrid',
            'Málaga' => 'Málaga',
            'Murcia' => 'Murcia',
            'Navarra' => 'Navarra',
            'Ourense' => 'Ourense',
            'Palencia' => 'Palencia',
            'Pontevedra' => 'Pontevedra',
            'Salamanca' => 'Salamanca',
            'Segovia' => 'Segovia',
            'Soria' => 'Soria',
            'Santa Cruz de Tenerife' => 'Santa Cruz de Tenerife',
            'Tarragona' => 'Tarragona',
            'Teruel' => 'Teruel',
            'Toledo' => 'Toledo',
            'Valencia' => 'Valencia',
            'Valladolid' => 'Valladolid',
            'Vizcaya' => 'Vizcaya',
            'Zamora' => 'Zamora',
            'Zaragoza' => 'Zaragoza',
        ]) ?>


    <?php // $form->field($model, 'usuario_id')->textInput() ?>

    <?php

    $usuariosTienda=Usuario::find()->where(['rol'=>'T'])->select(['id','nombre'])->all();

    //use yii\helpers\ArrayHelper;
    $listUsuariosTienda=ArrayHelper::map($usuariosTienda,'id', 'nombre');

    echo $form->field($model, 'usuario_id')->dropDownList(
        $listUsuariosTienda,
        ['prompt'=>'Seleccione un usuario tienda...']
    )->label("Usuario Tienda ID:") ?>

    <?= $form->field($model, 'activa')->dropDownList([
        0 => 'Inactiva',
        1 => 'Activa',

    ])->label("Estado de Tienda:") ?>

    <?= $form->field($model, 'visible')->dropDownList([
        0 => 'Invisible',
        1 => 'Visible',
    ])->label("Visibilidad Tienda:") ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
