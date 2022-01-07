<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-index">

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Categorias', ['create'], ['class' => 'btn btn-success w-100']) ?>
    </p>


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
            'nombre',
            'descripcion:ntext',
            'categoria_padre_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
