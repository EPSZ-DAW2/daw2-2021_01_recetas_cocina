<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Receta;
use app\models\RecetaPaso;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecetaPasoImagenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receta Paso Imagenes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Receta-paso-imagen-index">

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Receta Paso Imagen', ['create'], ['class' => 'btn btn-success w-100']) ?>
    </p>

    <?php //echo $this->render('_searchGlob', ['model' => $searchModel]); ?>
    <?php echo "<details class='my-3'><summary>Búsqueda Avanzada</summary>";
    echo $this->render('_search', ['model' => $searchModel]);
    echo "</details>";
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            ['label'=>'Receta', 'value' => function ($data) {
                return Receta::findOne(['id'=>Receta::esPropiedadPasoImagen(['id'=>$data->id])])->nombre;
            }],

            ['label'=>'Número de paso', 'value' => function ($data) {
                return RecetaPaso::findOne(['id'=>$data->receta_paso_id])->orden;
            }],
            'orden',
            'imagen:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
