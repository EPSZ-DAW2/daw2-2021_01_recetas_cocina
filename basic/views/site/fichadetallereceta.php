<?php

use app\models\Ingrediente;
use app\models\RecetaPaso;
use app\models\RecetaPasoImagen;
use app\models\Tienda;
use app\models\Tiendaoferta;

$rutaimg="uploads/";

?>

<body>
<div class="container">
  <h1 class="text-center bg-info rounded py-3"><?= $titulo ?></h1>
  <div class="card">
    <div class="card-body text-center">

        <?php
        if (isset($_GET["id"]))
        {
            foreach ($dataProvider->getModels() as $card)
            {
                if ($_GET["id"]==$card->id)
                { ?>
                    <h1 class="text-center mb-4 bg-warning"><?php echo $card->nombre ?></h1>
                    <img src='<?php echo $rutaimg.$card->imagen;?>' alt="..." width="50%">
                    <br></br>
                    <h3 class="text-center btn-verde">Descripción receta: </h3>
                    <p><?php echo $card->descripcion;?></p>
                <?php }
            }?>


            <h3 class="text-center mb-5 btn-verde">Ingredientes receta: </h3>
            <?php
            foreach ($dataProvider2->getModels() as $card2)
            {
                //echo "$card2->receta_id";
                if ($_GET["id"]==$card2->receta_id)
                {
                    $model = Ingrediente::find()->select('nombre')->where(['id' =>  $card2->ingrediente_id])->one();
                    ?>
                    <h5 class="text-center"><?php echo $card2->cantidad;echo " ";echo $card2->medida;echo " de ";echo $model->nombre ?></h5>

                    <?php
                }

            }
            ?>

            <h3 class="text-center mb-5 btn-verde" id="pasos">Pasos receta: </h3>
            <?php
            foreach ($dataProvider->getModels() as $card4)
            {
                //PASOS DE LA RECETA
                //echo "Receta ".$card4->id;
                if ($_GET["id"]==$card4->id)
                {

                    $model = RecetaPaso::find()->select('descripcion')->where(['receta_id' =>  $card4->id])->one();

                    $modeloRecetaPaso=RecetaPaso::find()->orderBy(['orden' => SORT_ASC,])->where(['receta_id' =>  $card4->id])->all();
                    ?>
                    <?php foreach ($modeloRecetaPaso as $card5)
                    {
                        ?>
                        <h5 class="text-center">Paso <?php echo $card5->orden; ?></h5>
                        <p class="text-center"><?php echo $card5->descripcion;?></p>

                        <?php 
                        //FOTOS DE LA RECETA
                        $modeloRecetaPasoImagen=RecetaPasoImagen::find()->orderBy(['orden' => SORT_ASC,])->where(['receta_paso_id' =>  $card5->id])->all();
                        foreach ($modeloRecetaPasoImagen as $card6)
                        {
                            ?>
                            <img style="width: 35%; margin: 2.5%" src='<?php echo $rutaimg.$card6->imagen;?>' class="card-img-top" alt="">
                            <?php
                        }
                         echo "</br></br>";
                    }
                    ?>

                    <?php
                }

            }
            ?>

            <h3 class="text-center mb-5 mt-5 btn-verde">OFERTAS RELACIONADAS: </h3>
            <div class="row">
            <?php
            foreach ($dataProvider2->getModels() as $card2)
            {
                if ($_GET["id"]==$card2->receta_id)
                {
                    $model = Ingrediente::find()->select('nombre')->where(['id' =>  $card2->ingrediente_id])->one();
                    $modeloOfertas=Tiendaoferta::find()->orderBy(['id' => SORT_DESC,])->where(['ingrediente_id' =>  $card2->ingrediente_id])->all();
                    ?>

                    <?php foreach ($modeloOfertas as $card3)
                    {
                    $modelTienda=Tienda::find()->where(['id'=>$card3->tienda_id])->one();
                    $modelProducto=Ingrediente::find()->where(['id'=>$card3->ingrediente_id])->one();
                    $tienda=$modelTienda->nombre;
                    $producto=$modelProducto->nombre;

                    ?>
                    <div class="col-lg-4 my-3 border-2 border-danger">
                        <a href="?r=site/vertiendaoferta&id=<?php echo $card3->id ?>" class="w-100">
                            <span class="w-100 btn bg-danger rounded"><?php echo "¡";echo $card3->descripcion;echo "!";?></span>
                            <span class="w-100 btn bg-warning rounded"><?php  echo $producto;echo " ("; echo $tienda; echo ") ";?></span>
                            <span class="w-100 btn bg-success rounded"><?php echo $card3->notas;?></span>
                        </a>
                    </div>

                <?php }
                }
            } ?>
            </div>

            <?php
        }
        else {?>
            <button class="btn bg-danger w-100">La receta no existe.</button>
        <?php } ?>
    </div>
  </div>
</div>
</body>
