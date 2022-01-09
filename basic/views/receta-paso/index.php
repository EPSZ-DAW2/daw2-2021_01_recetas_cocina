<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;
use app\models\Receta;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecetaPasoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Receta Pasos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Receta-paso-index">
    
<?php if (isset($_GET['msg'])){
            echo '<p class="btn btn-success w-100">';
            echo $_GET['msg'];
            echo '</p>';
        }?>

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Receta Paso'), ['create'], ['class' => 'btn btn-success w-100']) ?>
    </p>


    <?php echo "<details class='my-3'><summary>Búsqueda Avanzada</summary>";
    echo $this->render('_search', ['model' => $searchModel]);
    echo "</details>";
    ?>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
        GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'class' => 'table',
        ],
        'columns' => [
            //'id',
            ['label'=>'Receta', 'value' => function ($data) {
                return Receta::findOne(['id'=>$data->receta_id])->nombre;
           }],
            'orden',
            'descripcion:ntext',

            ['class' => 'yii\grid\ActionColumn',
            'header' => 'Acciones'],
            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Fotos',
                'template' => '{view}',

                'urlCreator' => function ($action, $model, $key, $index)
                {
                    if ($action === 'view')
                    {
                        $url ='index.php?r=receta-paso-imagen%2Findex&RecetaPasoImagenSearch%5Breceta_paso_id%5D='.$model->id;
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
