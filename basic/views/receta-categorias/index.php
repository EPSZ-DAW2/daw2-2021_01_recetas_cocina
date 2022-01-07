<?php

use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecetaCategoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receta Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receta-categorias-index">

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Receta Categorias', ['create'], ['class' => 'btn btn-success w-100']) ?>
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

            'id',
            'receta_id',
            'categoria_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'layout' => "\n{items}\n",
    ]); ?>

    <div class="text-center w-100">
        <?= LinkPager::widget([
            'pagination' => $dataProvider->pagination,
        ])?>

    </div>


</div>
