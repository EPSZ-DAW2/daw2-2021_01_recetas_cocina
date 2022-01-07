<?php

/* @var $this yii\web\View */

use app\models\Ingrediente;
use app\models\Tienda;
use yii\bootstrap5\LinkPager;

$this->title = 'Aplicación Web de recetas';

$rutaimg="uploads/";

?>

<div class="site-index ">
    <div class="container-fluid">
        <div class="row">


            <div class="col-lg-1 " style="display: inline;background-color: #ffe07d; border-radius: 20px; margin-bottom: 20px">
                <button class="w-100 btn bg-primary mx-0 mt-3" style="border-radius: 15px;  color: white">CATEGORIAS</button>
                <div class="d-flex flex-column h-100 mb-4 mt-4" style="width: auto; margin: auto;">

                    <details>
                        <summary class="btn btn-warning w-100 mt-1">Tipo de receta</summary>
                        <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                            <li class="nav-item"> <a href="#" class="nav-link active py-3 border-bottom"> <i class="fa fa-home"></i> <small>Vegetariana</small> </a> </li>
                            <li> <a href="#" class="nav-link bg-warning py-3 border-bottom"> <i class="fa fa-dashboard"></i> <small>Vegetariana</small> </a> </li>
                            <li> <a href="#" class="nav-link bg-warning py-3 border-bottom"> <i class="fa fa-dashboard"></i> <small>Vegetariana</small> </a> </li>
                            <li> <a href="#" class="nav-link bg-warning py-3 border-bottom"> <i class="fa fa-dashboard"></i> <small>Vegetariana</small> </a> </li>
                            <li> <a href="#" class="nav-link bg-warning py-3 border-bottom"> <i class="fa fa-dashboard"></i> <small>Vegetariana</small> </a> </li>
                            <li> <a href="#" class="nav-link bg-warning py-3 border-bottom"> <i class="fa fa-dashboard"></i> <small>Vegetariana</small> </a> </li>
                            <li> <a href="#" class="nav-link bg-warning py-3 border-bottom"> <i class="fa fa-dashboard"></i> <small>Vegetariana</small> </a> </li>
                            <li> <a href="#" class="nav-link bg-warning py-3 border-bottom"> <i class="fa fa-dashboard"></i> <small>Vegetariana</small> </a> </li>
                            <li> <a href="#" class="nav-link bg-warning py-3 border-bottom"> <i class="fa fa-dashboard"></i> <small>Vegetariana</small> </a> </li>
                            <li> <a href="#" class="nav-link bg-warning py-3 border-bottom"> <i class="fa fa-dashboard"></i> <small>Vegetariana</small> </a> </li>
                        </ul>
                    </details>

                </div>
            </div>

            <div class="col-lg-10 col-sm-12  mb-4">
                <div class="w-100 text-center border-1  " style="background-color: #c9e0c1; border-radius:25px ">
                    <img class="" style="width: 15%; " src="/daw2-2021_01_recetas_cocina/basic/web/images/libro-de-recetas.png">
                    <img class="" style="width: 60%; " src="/daw2-2021_01_recetas_cocina/basic/web/images/recetas.png">
                    <img class="" style="width: 15%; " src="/daw2-2021_01_recetas_cocina/basic/web/images/libro-de-recetas2.png">

                </div>

                <div class="w-100 text-center border-1 p-2 my-2 " style="background-color: #ffe07d;  ">
                    <h2 >Nuestras mejores recetas</h2>
                </div>

                <div class="body-content text-dark">

                    <div class="row">
                        <?php

                        foreach ($dataProvider->getModels() as $card){ ?>
                        <div class="col-lg-4 my-2">
                            <div class="card" style="width: auto; min-height: 650px">
                                <img src='<?php echo $rutaimg;echo $card->imagen;?>' class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $card->nombre ?></h5>
                                    <p class="card-text"><?= mb_strimwidth($card->descripcion , 0, 100, "...");  ?></p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item text-center"></li>
                                        <li class="list-group-item text-center">
                                            <span class="btn btn-warning"><?php echo "Dificultad: "; echo $card->dificultad; ?></span>
                                            <span class="btn btn-warning"><?php echo "Tiempo Elaboración: "; echo $card->tiempo_elaboracion;echo " mins "; ?></span>
                                        </li>
                                        <li class="list-group-item text-center">
                                            <span class="btn btn-warning"><?php echo "Número Comensales: "; echo $card->comensales; ?></span>
                                            <span class="btn btn-warning"><?php echo "Valoración: "; echo $card->valoracion; ?></span>
                                        </li>
                                        <li class="list-group-item text-center"></li>

                                    </ul>
                                    <div class="card-body text-center">
                                        <a href="?r=site/verreceta&id=<?= $card->id ?>" class="btn btn-primary">Información</a>
                                        <a href="#" class="btn btn-primary">Pasos de la receta</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php } ?>


                    </div>

                </div>
            </div>

            <div class="col-sm-12 col-lg-1" style="display: inline; background-color: #ffe07d; border-radius: 20px;margin-bottom: 20px" >
                <a href="?r=site/vertiendaofertas" class="w-100 btn bg-primary mx-0 mt-3" style="border-radius: 15px;  color: white">OFERTAS</a>
                <div class="d-flex flex-column h-100 mb-sm-4 mt-sm-4" style="width: auto; margin: auto;">

                    <ul class="nav nav-pills nav-flush flex-column mb-auto text- mt-3 ">

                        <?php foreach ($modeloOfertas as $card2){
                            $modelTienda=Tienda::find()->where(['id'=>$card2->tienda_id])->one();
                            $modelProducto=Ingrediente::find()->where(['id'=>$card2->ingrediente_id])->one();
                            $tienda=$modelTienda->nombre;
                            $producto=$modelProducto->nombre;
                            ?>

                        <li class="nav-item btn-verde rounded mb-3">

                            <a href="?r=site/vertiendaoferta&id=<?php echo $card2->id ?>" class="w-100">
                                <span class="w-100 btn bg-danger rounded"><?php echo "¡";echo $card2->descripcion;echo "!";?></span>
                                <span class="w-100 btn bg-warning rounded"><?php  echo $producto;echo " ("; echo $tienda; echo ") ";?></span>
                                <span class="w-100 btn bg-success rounded"><?php echo $card2->notas;?></span>

                            </a>
                        </li>
                        <?php } ?>
                        
                    </ul>

                </div>
            </div>
        </div>
    </div>


    <div class="text-center w-25 mx-auto">
        <?= LinkPager::widget([
            'pagination' => $dataProvider->pagination,

        ])?>

    </div>



</div>
