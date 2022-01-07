<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap5\LinkPager;


$this->title = 'Aplicación Web de recetas';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <div class="w-100">
            <img class="" style="width: 15%" src="/daw2-2021_01_recetas_cocina/basic/web/images/dieta.png">
        </div>
        <h1 class="display-4">Planificaciones</h1>

        <p class="lead">A continuacion se muestran las diferentes planificaciones:</p>

        <div class="menu-search">

            <?php $form = ActiveForm::begin([
                'action' => ['verplanificaciones'],
                'method' => 'get',
            ]); ?>

            <?= $form->field($searchModel, 'q')->textInput(['placeholder' => "Busqueda de planificaciones", "value"])->label('') ?>
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary my-3']) ?>

            <?php ActiveForm::end(); ?>

        </div>

    </div>

    <div class="body-content">

        <div class="row">

            <?php //foreach ($model as $card){ ?>
            <?php foreach ($dataProvider->getModels() as $card){ ?>

            <div class="card col-lg-4 my-3 text-center">
                <h2 class="text-center"><b><?php echo strtoupper($card->nombre) ?></b></h2>
                <h4><?php echo $card->periodo;?> días</h4>

                <p><?php echo mb_strimwidth($card->notas, 0, 175, "...");?></p>


                <p><a class="btn btn-outline-secondary" href="?r=site/verplanificacion&id=<?php echo $card->id?>">Ficha detallada &raquo;</a></p>
            </div>
            <?php }?>

        </div>

        <div class="text-center w-100">
            <?= LinkPager::widget([
                'pagination' => $dataProvider->pagination,
        ])?>

        </div>

    </div>
</div>
