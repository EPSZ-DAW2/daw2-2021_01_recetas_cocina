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


    <?= $form->field($model, 'aceptada')->dropDownList([
        0 => 'Pendiente',
        1 => 'Aceptado',
        2 => 'No aceptado',
    ])->label("Estado de aceptacion:") ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Subir'), ['class' => 'btn btn-success w-100 my-3']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
