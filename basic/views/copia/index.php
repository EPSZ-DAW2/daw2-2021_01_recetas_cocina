<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Copia de seguridad');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">
    <p class="btn btn-success w-100"><?php echo $msg;?></p>

<h1 class="text-center w-100 rounded btn-verde"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Listado Copias de Seguridad'), ['index'], ['class' => 'btn btn-warning mt-3']) ?>
        <?= Html::a(Yii::t('app', 'Hacer Copia de Seguridad'), ['copia'], ['class' => 'btn btn-verde mt-3']) ?>
        <?= Html::a(Yii::t('app', 'Descargar Copia SQL'), ['descargar'], ['class' => 'btn btn-primary mt-3']) ?>
        <?= Html::a(Yii::t('app', 'Restaurar Copia de Seguridad'), ['restaurarcopia'], ['class' => 'btn btn-danger mt-3']) ?>
    </p>
    <?php
    echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
    ['class' => 'yii\grid\SerialColumn'],
    'nombre',
    'ruta'
    ],
    'layout' => "\n{items}\n",
    ]);
    ?>

    <div class="text-center w-100">
        <?= LinkPager::widget([
            'pagination' => $dataProvider->pagination,
        ])?>

    </div>


</div>
