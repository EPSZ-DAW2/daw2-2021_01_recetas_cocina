<?php

use app\models\Usuario;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Receta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="Receta-form">

    <?php //$form = ActiveForm::begin();
     $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>

    <?= $form->field($model, 'nombre')->textarea(['rows' => 6,'class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6,'class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?php // $form->field($model, 'tipo_plato')->textInput(['maxlength' => true,'class'=> 'w-100 btn btn-verde  my-3']) ?>
    <?= $form->field($model, 'tipo_plato')->dropDownList([
        'E' => 'Entrante',
         1 => 'Primero',
         2 => 'Segundo',
        'P' => 'Postre',
    ])->label("Tipo de plato:") ?>

    <?php //$form->field($model, 'dificultad')->textInput(['class'=> 'w-100 btn btn-verde  my-3']) ?>
    <?= $form->field($model, 'dificultad')->dropDownList([
        1 => 'Muy Facil',
        2 => 'Facil',
        3 => 'Normal',
        4 => 'Dificil',
        5 => 'Muy Dificil',
    ])->label("Dificultad del plato:") ?>

    <?= $form->field($model, 'comensales')->textInput(['class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?= $form->field($model, 'tiempo_elaboracion')->textInput(['class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?php // $form->field($model, 'valoracion')->textInput(['class'=> 'w-100 btn btn-verde  my-3']) ?>
    <?= $form->field($model, 'valoracion')->dropDownList([
        1 => 'Muy Malo',
        2 => 'Malo',
        3 => 'Normal',
        4 => 'Bueno',
        5 => 'Muy Bueno',
    ])->label("Valoracion de plato:") ?>

    <?php
        if (Usuario::esUsuarioColaborador(Yii::$app->user->identity->id))
        {
            echo $form->field($model, 'usuario_id')->hiddenInput(['class'=> 'w-100 btn btn-verde  my-3'])->label("");
        }
        else
        {
            echo $form->field($model, 'usuario_id')->textInput(['class'=> 'w-100 btn btn-verde  my-3']);
        }
    ?>

    <?php // $form->field($model, 'aceptada')->textInput(['class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?= $form->field($model, 'aceptada')->dropDownList([
        0 => 'Pendiente',
        1 => 'Aceptado',
        2 => 'No aceptado',
    ])->label("Estado de aceptacion:") ?>

    <?= $form->field($model, 'imagen')->hiddenInput(['class'=> 'w-100 btn btn-verde  my-3'])->label("") ?>

    <?=  $form->field($model, 'imageFile')->fileInput(['class'=> 'w-100 btn btn-warning  my-3'])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Subir'), ['class' => 'btn btn-success w-100 my-3']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
