<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ingrediente */

$this->title = Yii::t('app', 'Crear Ingrediente');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingredientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingrediente-create">

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
