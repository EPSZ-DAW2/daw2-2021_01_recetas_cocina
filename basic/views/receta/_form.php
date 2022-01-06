<?php

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

    <?= $form->field($model, 'tipo_plato')->textInput(['maxlength' => true,'class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?= $form->field($model, 'dificultad')->textInput(['class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?= $form->field($model, 'comensales')->textInput(['class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?= $form->field($model, 'tiempo_elaboracion')->textInput(['class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?= $form->field($model, 'valoracion')->textInput(['class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?= $form->field($model, 'usuario_id')->textInput(['class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?= $form->field($model, 'aceptada')->textInput(['class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?= $form->field($model, 'imagen')->hiddenInput(['class'=> 'w-100 btn btn-verde  my-3'])->label("") ?>

    <?=  $form->field($model, 'imageFile')->fileInput(['class'=> 'w-100 btn btn-warning  my-3'])?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Subir'), ['class' => 'btn btn-success w-100 my-3']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
