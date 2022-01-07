<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecetaPasoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Receta Pasos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Receta-paso-index">

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
            'id',
            'receta_id',
            'orden',
            'descripcion:ntext',

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
