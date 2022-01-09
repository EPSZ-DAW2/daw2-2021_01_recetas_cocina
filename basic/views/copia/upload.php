<?php

use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

$this->title="Subida de fichero sql a copia de seguridad"
?>


<div class="Receta-create">
    <?php if (isset($_GET['msg'])){
        echo '<p class="btn btn-danger w-100">';
        echo $_GET['msg'];
        echo '</p>';
    }?>

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>
    <p class="text-center">
        <?= Html::a(Yii::t('app', 'Listado Copias de Seguridad'), ['index'], ['class' => 'btn btn-warning mt-3']) ?>
        <?= Html::a(Yii::t('app', 'Hacer Copia de Seguridad'), ['copia'], ['class' => 'btn btn-primary mt-3']) ?>
        <?= Html::a(Yii::t('app', 'Descargar Copia Actual SQL'), ['descargaractual'], ['class' => 'btn btn-success mt-3']) ?>
    </p>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'file')->fileInput(['class'=> 'w-100 btn btn-verde  my-3'])->label("Fichero sql: ",['class'=> 'w-100 btn btn-primary  my-3']) ?>

    <button class="btn btn-success mt-3 w-100">Subir fichero sql</button>

    <?php ActiveForm::end() ?>
</div>
