<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecetaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="Receta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'tipo_plato') ?>

    <?= $form->field($model, 'dificultad') ?>

    <?php  echo $form->field($model, 'comensales') ?>

    <?php  echo $form->field($model, 'tiempo_elaboracion') ?>

    <?php  echo $form->field($model, 'valoracion') ?>

    <?php  //echo $form->field($model, 'usuario_id') ?>

    <?php  echo $form->field($model, 'aceptada') ?>

    <?php  //echo $form->field($model, 'imagen') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Resetear'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
