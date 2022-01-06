<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

<h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <div class="mx-auto text-center">
        <?= Html::a(Yii::t('app', 'Create Usuario'), ['create'], ['class' => 'btn btn-success mt-3 ']) ?>
        <?= Html::a(Yii::t('app', 'Aceptar Usuarios'), ['usuariosaceptar'], ['class' => 'btn btn-primary mt-3 ']) ?>
    </div>

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
            'email:email',
            'password',
            'nombre',
            'rol',
            'aceptado',
            'creado',

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
