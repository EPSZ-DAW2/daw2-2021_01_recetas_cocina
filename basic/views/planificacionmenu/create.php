<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Planificacionmenu */

$this->title = Yii::t('app', 'Añadir menú a planificación');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Planificacionmenu'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planificacionmenu-create">

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
