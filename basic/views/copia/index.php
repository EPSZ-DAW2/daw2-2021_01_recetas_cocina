<?php

use app\models\Subidasql;
use app\models\UploadForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Copia de seguridad');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">
    <?php if (isset($msg) && !empty($msg)){?>
    <p class="btn btn-success w-100">
        <?php echo $msg;?>
    </p>
    <?php }?>
    <?php if (isset($msgError) && !empty($msgError)){?>
        <p class="btn btn-danger w-100">
            <?php echo $msgError;?>
        </p>
    <?php }?>

<h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <p class="text-center">
        <?= Html::a(Yii::t('app', 'Listado copias de BBDD'), ['index'], ['class' => 'btn btn-warning mt-3']) ?>
        <?= Html::a(Yii::t('app', 'Listado copias de ficheros'), ['indexfiles'], ['class' => 'btn btn-warning mt-3']) ?>
        <?= Html::a(Yii::t('app', 'Hacer Copia de Seguridad'), ['copia'], ['class' => 'btn btn-primary mt-3']) ?>
        <?= Html::a(Yii::t('app', 'Descargar Copia Actual SQL'), ['descargaractual'], ['class' => 'btn btn-success mt-3']) ?>
        <?= Html::a(Yii::t('app', 'Subir Copia BBDD'), ['upload'], ['class' => 'btn btn-secondary mt-3']) ?>
    </p>
    <?php
    echo GridView::widget([

    'dataProvider' => $dataProvider,
    'columns' => [

        ['class' => 'yii\grid\SerialColumn','headerOptions' => ['style' => 'text-align: center !important;'],],
        ['attribute' => 'nombre', 'headerOptions' => ['class' => 'text-center',],],
        ['attribute' => 'ruta', 'headerOptions' => ['class' => 'text-center',],],
        ['class' => 'yii\grid\ActionColumn',
            'header' => 'Restaurar',
            'headerOptions' => ['style' => 'text-align: center !important;'],
            'template' => '{play}',
            'buttons' => [
                'play' => function ($url, $model) {
                    return Html::a(
                        '<div class="text-center m-0 p-0"><span class="bi-cloud-arrow-up-fill m-0 p-0" style="font-size: 32px; "></span></div>',
                        ['copia/restaurarcopia', 'f' => $model['nombre']],
                        [
                            'title' => 'Restaurar',
                            'data-pjax' => '0',
                            'data' => [
                                'confirm' => Yii::t('app', '¿Desea sobreescribir su base de datos con esta copia de seguridad?'),
                                'method' => 'post',
                            ],
                        ]
                    );
                },
            ],

        ],

        ['class' => 'yii\grid\ActionColumn',
            'header' => 'Borrar',
            'headerOptions' => ['style' => 'text-align: center !important;'],
            'template' => '{play}',
            'buttons' => [
                'play' => function ($url, $model) {
                    return Html::a(
                        '<div class="text-center m-0 p-0"><span class="bi-trash-fill mx-2 text-center" style="font-size: 32px; color: red;"></span></div>',
                        ['copia/borrarcopia', 'f' => $model['nombre']],
                        [
                            'title' => 'Borrar',
                            'data-pjax' => '0',
                            'data' => [
                                'confirm' => Yii::t('app', '¿Desea borrar esta copia de seguridad de la BBDD?'),
                                'method' => 'post',
                            ],
                        ]
                    );
                },
            ],

        ],

        ['class' => 'yii\grid\ActionColumn',
            'header' => 'Descargar',
            'headerOptions' => ['style' => 'text-align: center !important;'],
            'template' => '{download}',
            'buttons' => [
                'download' => function ($url, $model) {
                    return Html::a(
                        '<div class="text-center m-0 p-0"><i class="bi-cloud-download-fill mx-2 text-center" style="font-size: 32px; color: green;"></i></div>',
                        ['copia/descargarsql', 'f' => $model['nombre']],
                        [
                            'title' => 'Borrar',
                            'data-pjax' => '0',
                        ]
                    );
                },
            ],

        ],

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
