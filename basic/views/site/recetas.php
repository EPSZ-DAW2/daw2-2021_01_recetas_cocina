<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap5\LinkPager;


$this->title = 'Aplicación Web de recetas';

$rutaimg="uploads/";


?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <div class="w-100">
            <img class="" style="width: 15%" src="/daw2-2021_01_recetas_cocina/basic/web/images/recipes.png">
        </div>
        <h1 class="display-4">Recetas</h1>

        <p class="lead">A continuacion se muestra las recetas disponibles:</p>

        <div class="Receta-search">

            <?php $form = ActiveForm::begin([
                'action' => ['verrecetas'],
                'method' => 'get',
            ]); ?>

            <?= $form->field($searchModel, 'q')->textInput(['placeholder' => "Busqueda de Recetas", "value"])->label('') ?>
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary my-3']) ?>

            <?php ActiveForm::end(); ?>

        </div>

    </div>

    <div class="body-content">

        <div class="row">

            <?php //foreach ($model as $card){ ?>
            <?php foreach ($dataProvider->getModels() as $card){ ?>
                    
                <div class="card col-lg-4 my-3 text-center">
                    
                    <img src='<?php echo $rutaimg.$card->imagen;?>' class="card-img-top" alt="...">

                    <h2 class="text-center"><?php echo $card->id; echo ". "; echo $card->nombre ?></h2>
                    <p><?php echo "<img src=/daw2-2021_01_recetas_cocina/basic/web/images/comensales.png></img>".$card->comensales." | ";?>
                    <?php //Nivel de dificultad
                    switch ($card->dificultad) {
                        case 1:
                            echo "Muy Fácil";
                            break;
                        case 2:
                            echo "Fácil";
                            break;
                        case 3:
                            echo "Intermedio";
                            break;
                        case 2:
                            echo "Dificil";
                            break;
                        case 2:
                            echo "Muy Dificil";
                            break;
                    }
                    echo " | <img src=/daw2-2021_01_recetas_cocina/basic/web/images/tiempo.png></img>".$card->tiempo_elaboracion."</p>"?>
                    <p><?php echo mb_strimwidth($card->descripcion, 0, 400, "...");  // devuelve solo los 400 primeros caracteres?></p>

                    <p><a class="btn btn-outline-secondary" href="?r=site/verreceta&id=<?php echo $card->id?>">Ficha detallada &raquo;</a></p>
                </div>
            <?php }?>

        <div class="text-center w-100">
            <?= LinkPager::widget([
                'pagination' => $dataProvider->pagination,
        ])?>

        </div>

    </div>
</div>
