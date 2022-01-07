<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ingrediente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ingrediente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true,'class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6,'class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?= $form->field($model, 'datos_nutricion')->textarea(['rows' => 6,'class'=> 'w-100 btn btn-verde  my-3']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success w-100 my-3']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
