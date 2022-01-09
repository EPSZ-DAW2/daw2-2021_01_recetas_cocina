<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecetaCategorias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receta-categorias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'receta_id')->textInput() ?>

    <?= $form->field($model, 'categoria_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
