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
        <h1 class="display-4">Ingredientes</h1>

        <p class="lead">A continuacion se muestra los ingredientes disponibles para las recetas:</p>

        <div class="ingrediente-search">

            <?php $form = ActiveForm::begin([
                'action' => ['veringredientes'],
                'method' => 'get',
            ]); ?>

            <?= $form->field($searchModel, 'q')->textInput(['placeholder' => "Busqueda de ingredientes", "value"])->label('') ?>
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary my-3']) ?>

            <?php ActiveForm::end(); ?>

        </div>

    </div>

    <div class="body-content">

        <div class="row">

            <?php //foreach ($model as $card){ ?>
            <?php foreach ($dataProvider->getModels() as $card){ ?>

            <div class="card col-lg-4 my-3 text-center">
                <h2 class="text-center"><?php echo $card->id; echo ". "; echo $card->nombre ?></h2>

                <p><?php echo $card->descripcion;?></p>

                <p><a class="btn btn-outline-secondary" href="?r=site/veringrediente&id=<?php echo $card->id?>">Ficha detallada &raquo;</a></p>
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
