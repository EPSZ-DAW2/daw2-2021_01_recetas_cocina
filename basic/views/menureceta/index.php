<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MenurecetaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menú-recetas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menureceta-index">

<?php if (isset($_GET['msg'])){
            echo '<p class="btn btn-success w-100">';
            echo $_GET['msg'];
            echo '</p>';
        }?>

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Añadir receta a menú'), ['create'], ['class' => 'btn btn-success w-100 ']) ?>
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
        'columns' => [
        

            'id',
            'menu_id',
            'receta_id',

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
