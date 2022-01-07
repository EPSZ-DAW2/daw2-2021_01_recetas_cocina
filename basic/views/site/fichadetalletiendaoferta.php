<?php

use app\models\Ingrediente;
use app\models\TiendaSearch;

?>

<body>
<div class="container">
  <h3 class="text-center bg-info rounded py-3"><?= $titulo ?></h3>
  <div class="card">
    <div class="card-body text-center">

        <?php
        if (isset($_GET["id"]))
        {
            $existe=0;

            foreach ($dataProvider->getModels() as $card)
            {
                if ($_GET["id"]==$card->id)
                {
                    $existe=1;
                    $model = Ingrediente::find()->select('nombre')->where(['id' =>  $card->ingrediente_id])->one();
                    $model2 = TiendaSearch::find()->select(['nombre', 'domicilio','provincia'])->where(['id' =>  $card->tienda_id])->one();
                ?>

                <h1 class="text-center bg-warning"><?php  echo $model->nombre ?></h1>
                    <h3 class="text-center mt-4 btn-verde">Supermercado: </h3>
                    <p><?php echo "Oferta del "; echo $model2->nombre;echo " (";echo $model2->domicilio;echo ", ";echo $model2->provincia;echo ") ";?></p>

                    <h3 class="text-center btn-verde">Descripcion: </h3>
                <p><?php echo $card->descripcion;?></p>
                    <h3 class="text-center btn-verde">Envase: </h3>
                <p><?php echo $card->envase;?></p>
                <h3 class="text-center btn-verde">Cantidad: </h3>
                <p><?php echo $card->cantidad;echo " "; echo $card->medida ?></p>
                <h3 class="text-center btn-verde">Detalles:</h3>
                <p><?php echo $card->notas;?></p>


            <?php }
            }
            if ($existe==0)
            { ?>
                <button class="btn bg-danger w-100">La oferta no existe.</button>
             <?php }

        }
        else {?>
            <button class="btn bg-danger w-100">La tienda no existe.</button>
        <?php } ?>
    </div>
  </div>
</div>
</body>
