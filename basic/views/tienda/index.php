<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;


/* @var $this yii\web\View */
/* @var $searchModel app\models\TiendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tiendas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tienda-index">

    <?php if (isset($_GET['msg'])){
            echo '<p class="btn btn-success w-100">';
            echo $_GET['msg'];
            echo '</p>';
        }?>

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Tienda'), ['create'], ['class' => 'btn btn-success w-100']) ?>
    </p>

    <?php echo $this->render('_searchGlob', ['model' => $searchModel]); ?>
    <?php echo "<details class='my-3'><summary>Búsqueda Avanzada</summary>";
        echo $this->render('_search', ['model' => $searchModel]);
        echo "</details>";
        ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'class' => 'table',
        ],
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'domicilio',
            'poblacion',
            'provincia',

            //'usuario_id',
            //'activa',
            //'visible',

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Acciones'],

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Ofertas',
                'template' => '{view}',

                'urlCreator' => function ($action, $model, $key, $index)
                {
                    if ($action === 'view')
                    {
                        $url ='index.php?r=tiendaoferta/index&TiendaofertaSearch%5Bidq%5D='.$model->id.'&nametienda='.$model->nombre;
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
