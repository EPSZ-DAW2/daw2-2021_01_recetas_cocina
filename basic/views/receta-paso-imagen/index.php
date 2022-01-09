<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;
use app\models\Receta;
use app\models\RecetaPaso;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecetaPasoImagenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Receta Paso Imagenes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Receta-paso-imagen-index">

<?php if (isset($_GET['msg'])){
            echo '<p class="btn btn-success w-100">';
            echo $_GET['msg'];
            echo '</p>';
        }?>

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear imagen para un paso'), ['create'], ['class' => 'btn btn-success w-100']) ?>
    </p>

    <?php //echo $this->render('_searchGlob', ['model' => $searchModel]); ?>
    <?php echo "<details class='my-3'><summary>Búsqueda Avanzada</summary>";
    echo $this->render('_search', ['model' => $searchModel]);
    echo "</details>";
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'class' => 'table',
        ],
        'columns' => [

            'id',
            ['label'=>'Receta', 'value' => function ($data) {
                //return Receta::findOne(['id'=>RecetaPaso::findOne(['id'=>$data->receta_id])->id])->nombre;
                $id_receta = RecetaPaso::findOne(['id'=>$data->receta_paso_id]);
                return Receta::findOne(['id'=>$id_receta->receta_id])->nombre;
            }],

            ['label'=>'Número de paso', 'value' => function ($data) {
                return RecetaPaso::findOne(['id'=>$data->receta_paso_id])->orden;
            }],
            'orden',
            'imagen:ntext',

            ['class' => 'yii\grid\ActionColumn',
            'header' => 'Acciones'],
        ],
        'layout' => "\n{items}\n",

    ]); ?>

    <div class="text-center w-100">
        <?= LinkPager::widget([
            'pagination' => $dataProvider->pagination,
        ])?>
    </div>

</div>
