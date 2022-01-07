<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Recetas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-indexAceptar">

<h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>


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
            'header' => 'Aceptar',
            'template' => '{update}',

            'urlCreator' => function ($action, $model, $key, $index)
            {
                if ($action === 'update')
                {
                    $url ='index.php?r=receta%2Faceptar&id='.$model->id;
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
