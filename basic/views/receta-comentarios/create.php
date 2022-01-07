<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecetaComentarios */

$this->title = 'Create Receta Comentarios';
$this->params['breadcrumbs'][] = ['label' => 'Receta Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receta-comentarios-create">

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
