<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecetaPasoImagen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="Receta-paso-imagen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'receta_paso_id')->textInput(['class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?= $form->field($model, 'orden')->textInput(['class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?php // $form->field($model, 'imagen')->textarea(['rows' => 6,'class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?=  $form->field($model, 'imageFile')->fileInput(['class'=> 'w-100 btn btn-warning  my-3'])?>

    <?= $form->field($model, 'imagen')->hiddenInput(['class'=> 'w-100 btn btn-verde  my-3'])->label("") ?>


    <div class="form-group">
        <?= Html::submitButton('Subir', ['class' => 'btn btn-success w-100 my-3']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
