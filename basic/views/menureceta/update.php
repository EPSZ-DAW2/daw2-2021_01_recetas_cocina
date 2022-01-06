<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menureceta */

$this->title = Yii::t('app', 'Actualizar menú-receta: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menurecetas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="menureceta-update">

    <h1 class="tituloCrud" ><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
