<?php

use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecetaCategoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Categorias';
$this->title = 'Recetas y sus categorias asociadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receta-categorias-index">

<?php if (isset($_GET['msg'])){
            echo '<p class="btn btn-success w-100">';
            echo $_GET['msg'];
            echo '</p>';
        }?>

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <!--p-->
        <!--?= Html::a('Crear una nueva categoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p-->

    <?php //echo $this->render('_searchGlob', ['model' => $searchModel]); ?>
    <?php //echo "<details class='my-3'><summary>Búsqueda Avanzada</summary>";
    /*echo $this->render('_search', ['model' => $searchModel]);
    echo "</details>";
    */?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'class' => 'table',
        ],
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre:ntext',

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Añadir categoria', 
                'template' => '{update}',
                'urlCreator' => function ($action, $model, $key, $index)
                {
                    if ($action === 'update')
                    {
                        $url ='index.php?r=receta-categorias%2Fupdate&id='.$model->id;
                        return $url;
                    }
                },
            ],
        ],
        'layout' => "\n{items}\n",
    ]); ?>
    Pulse en el icono del lapiz para ver las categorias asociadas y añadir nuevas o eliminarlas.

    <div class="text-center w-100">
        <?= LinkPager::widget([
            'pagination' => $dataProvider->pagination,
        ])?>

    </div>
</div>
