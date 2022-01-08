<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecetaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Recetas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Receta-index">

    <?php if (isset($_GET['msg'])){
            echo '<p class="btn btn-success w-100">';
            echo $_GET['msg'];
            echo '</p>';
        }?>

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>


    <div class="mx-auto text-center">
        <?= Html::a(Yii::t('app', 'Create Receta'), ['create'], ['class' => 'btn btn-success mt-3 ']) ?>
        <?= Html::a(Yii::t('app', 'Aceptar Receta'), ['recetasaceptar'], ['class' => 'btn btn-primary mt-3 ']) ?>
    </div>

    <?php echo $this->render('_searchGlob', ['model' => $searchModel]); ?>
    <?php echo "<details class='my-3'><summary>Búsqueda Avanzada</summary>";
    echo $this->render('_search', ['model' => $searchModel]);
    echo "</details>";
    ?>

    <?= 
        GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'class' => 'table',
        ],
        'columns' => [
        
            //'id',
            'nombre:ntext',
            // 'descripcion:ntext',
            'tipo_plato',
            'dificultad',
            //'comensales',
            //'tiempo_elaboracion',
            'valoracion',
            //'usuario_id',
            'aceptada',
            'imagen',

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Acciones'],

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Pasos',
                'template' => '{view}',

                'urlCreator' => function ($action, $model, $key, $index)
                {
                    if ($action === 'view')
                    {
                        $url ='index.php?r=receta-paso%2Findex&RecetaPasoSearch%5Breceta_id%5D='.$model->id;
                        return $url;
                    }
                },
            ],
        ],
            'layout' => "\n{items}\n",
    ]); ?>

<div class="text-center w-100">
        <?= LinkPager::widget([
            'pagination' => $dataProvider->pagination,
        ])?>

    </div>


</div>
