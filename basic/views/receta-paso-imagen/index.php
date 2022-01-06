<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecetaPasoImagenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receta Paso Imagenes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Receta-paso-imagen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Receta Paso Imagen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'receta_paso_id',
            'orden',
            'imagen:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
