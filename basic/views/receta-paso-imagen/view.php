<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RecetaPasoImagen */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Receta Paso Imagenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="Receta-paso-imagen-view">

    <p class="text-center rounded bg-success text-white"><?php if(isset($msg)) echo $msg; ?></p>

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'receta_paso_id',
            'orden',
            'imagen:ntext',
        ],
    ]) ?>

</div>
