<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menús');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Menú'), ['create'], ['class' => 'btn btn-success w-100']) ?>
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
            'titulo:ntext',
            'descripcion:ntext',
            'usuario_id',

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
