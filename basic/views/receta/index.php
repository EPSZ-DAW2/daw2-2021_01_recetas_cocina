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

    <p class="text-center rounded bg-success"><?php if(isset($msg)) echo $msg; ?></p>

    <h1 class="btn-naranja text-center mb-5"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Receta'), ['create'], ['class' => 'btn btn-success w-100']) ?>
    </p>

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
        
            'id',
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
