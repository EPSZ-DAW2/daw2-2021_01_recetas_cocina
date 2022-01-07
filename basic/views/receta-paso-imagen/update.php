<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecetaPasoImagen */

$this->title = 'Update Receta Paso Imagen: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Receta Paso Imagenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Receta-paso-imagen-update">

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
