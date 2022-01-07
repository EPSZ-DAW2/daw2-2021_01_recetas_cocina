<?php

use app\models\Ingrediente;
use app\models\Receta;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Recetaingrediente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recetaingrediente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'receta_id')->textInput() ?>

    <?php

    $recetas=Receta::find()->all();

    //use yii\helpers\ArrayHelper;
    $listRecetas=ArrayHelper::map($recetas,'id', 'nombre');

    echo $form->field($model, 'receta_id')->dropDownList(
        $listRecetas,
        ['prompt'=>'Seleccione una receta...']
    )?>

    <?php

    $ingredientes=Ingrediente::find()->all();

    //use yii\helpers\ArrayHelper;
    $listIngredientes=ArrayHelper::map($ingredientes,'id', 'nombre');

    echo $form->field($model, 'ingrediente_id')->dropDownList(
        $listIngredientes,
        ['prompt'=>'Seleccione un ingrediente...']
    )?>

    <?php // $form->field($model, 'ingrediente_id')->textInput(['class' => 'btn btn-success w-100 my-3']) ?>

    <?= $form->field($model, 'cantidad')->textInput(['class' => 'btn btn-verde w-100 my-3']) ?>

    <?= $form->field($model, 'medida')->textInput(['maxlength' => true,'class' => 'btn btn-verde w-100 my-3']) ?>

    <?= $form->field($model, 'notas')->textarea(['rows' => 6,'class' => 'btn btn-verde w-100 my-3']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success w-100 my-3']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
