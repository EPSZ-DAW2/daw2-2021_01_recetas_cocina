<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menureceta */

$this->title = Yii::t('app', 'Añadir receta a menú');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menurecetas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menureceta-create">

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
