<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Receta */

$this->title = Yii::t('app', 'Crear Receta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recetas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Receta-create">

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
