<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecetaPaso */

$this->title = Yii::t('app', 'Create Receta Paso');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Receta Pasos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Receta-paso-create">

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
