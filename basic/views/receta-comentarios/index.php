<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecetaComentariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receta Comentarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receta-comentarios-index">

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Receta Comentarios', ['create'], ['class' => 'btn btn-success w-100']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'receta_id',
            'usuario_id',
            'fechahora',
            'texto:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
