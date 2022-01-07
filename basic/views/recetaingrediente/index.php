<?php

use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecetaingredienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ingredientes de Receta');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recetaingrediente-index">

    <h1  class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Receta-Ingrediente'), ['create'], ['class' => 'btn btn-success w-100']) ?>
    </p>

    <?php echo $this->render('_searchGlob', ['model' => $searchModel]); ?>
    <?php echo "<details class='my-3'><summary>Búsqueda Avanzada</summary>";
    echo $this->render('_search', ['model' => $searchModel]);
    echo "</details>";
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'options' => [
            'class' => 'table',
        ],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'receta_id',
            'ingrediente_id',
            'cantidad',
            'medida',
            //'notas:ntext',

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
