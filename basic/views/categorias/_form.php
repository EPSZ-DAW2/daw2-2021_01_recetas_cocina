<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categorias;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Categorias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categorias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true,'class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6,'class'=> 'w-100 btn btn-verde  my-3']) ?>
    
    <?php

    $categorias=Categorias::find()->all();

    //use yii\helpers\ArrayHelper;
    $listCategorias=ArrayHelper::map($categorias,'id','nombre');

    echo $form->field($model, 'categoria_padre_id')->dropDownList(
        $listCategorias,
        ['prompt'=>'Seleccione una categoría padre...']
    );

    ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success w-100 my-3']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
