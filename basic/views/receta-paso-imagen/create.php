<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecetaPasoImagen */

$this->title = 'Create Receta Paso Imagen';
$this->params['breadcrumbs'][] = ['label' => 'Receta Paso Imagenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Receta-paso-imagen-create">

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
