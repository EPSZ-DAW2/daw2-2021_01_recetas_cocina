<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Recetaingrediente */

$this->title = Yii::t('app', 'Crear Receta-ingrediente');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recetaingredientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recetaingrediente-create">

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
