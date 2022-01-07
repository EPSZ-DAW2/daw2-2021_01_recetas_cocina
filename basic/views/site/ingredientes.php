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
            <img class="" style="width: 15%" src="/daw2-2021_01_recetas_cocina/basic/web/images/grocery.png">
        </div>
        <h1 class="display-4 text-center">Ingredientes</h1>

        <p class="lead">A continuacion se muestra los ingredientes disponibles para las recetas:</p>

        <div class="ingrediente-search">

            <?php $form = ActiveForm::begin([
                'action' => ['veringredientes'],
                'method' => 'get',
            ]); ?>

            <?php echo "<details class='my-3 btn btn-verde w-100'><summary>Búsqueda Global</summary>";?>

            <?= $form->field($searchModel, 'q')->textInput(['placeholder' => "Busqueda de ingredientes", "value"])->label('') ?>
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary my-3']) ?>

            <?php
            echo "</details>";
            ?>

            <?php ActiveForm::end(); ?>

        </div>

        <div class="ingrediente-search">

            <?php $form = ActiveForm::begin([
                'action' => ['veringredientes'],
                'method' => 'get',
            ]); ?>


            <?php echo "<details class='my-3 btn btn-verde w-100'><summary>Búsqueda por tipo de ingrediente</summary>";?>

            <?= $form->field($searchModel, 'tipo')->dropDownList([
                '' => "Seleccione tipo de ingrediente...",
                'condimento' => 'Tipo Condimento',
                'vegano' => 'Tipo Vegano',
                'vegetariano' => 'Tipo Vegetariano',
                'salsa' => 'Tipo Salsa',
                'conserva' => 'Tipo Conserva',
                'bebida' => 'Tipo Bebida',
                'carne' => 'Tipo Carne',
                'pescado' => 'Tipo Pescado',
                'verdura' => 'Tipo Verdura',
                'pasta' => 'Tipo Pasta',
                'legumbre' => 'Tipo Legumbre',

            ])->label("") ?>
            <?= Html::submitButton('Buscar Tipo Ingrediente', ['class' => 'btn btn-primary my-3']) ?>


            <?php
            echo "</details>";
            ?>

            <?php ActiveForm::end(); ?>

        </div>

    </div>

    <div class="body-content">

        <div class="row">

            <?php //foreach ($model as $card){ ?>
            <?php foreach ($dataProvider->getModels() as $card){ ?>

            <div class="card col-lg-4 my-3 text-center">
                <h2 class="text-center"><?= $card->nombre ?></h2>

                <p><?php echo mb_strimwidth($card->descripcion, 0, 175, "...");?></p>

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
