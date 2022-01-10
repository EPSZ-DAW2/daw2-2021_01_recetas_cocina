<?php
use app\models\Ingrediente;
use app\models\RecetaPaso;
use app\models\RecetaPasoImagen;
use app\models\Tienda;
use app\models\Usuario;
use app\models\Tiendaoferta;
use app\models\RecetaComentarios;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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

            <?php
            foreach ($dataProvider->getModels() as $card8)
            {
                if ($_GET["id"]==$card8->id)
                { ?>
                    <p>Receta subida por: <?php
                     $modeloUsuario=Usuario::find()->select('nombre')->where(['id' =>  $card8->usuario_id])->one();
                    echo $modeloUsuario->nombre;?></p>
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

            <h3 class="text-center mb-5 btn-verde mt-5" id="pasos">Pasos receta: </h3>
            <?php
            foreach ($dataProvider->getModels() as $card4)
            {
                //PASOS DE LA RECETA
                //echo "Receta ".$card4->id;
                if ($_GET["id"]==$card4->id)
                {
                    $modeloRecetaPaso=RecetaPaso::find()->orderBy(['orden' => SORT_ASC,])->where(['receta_id' =>  $card4->id])->all();
                    
                    foreach ($modeloRecetaPaso as $card5)
                    {
                        ?>
                        <h5 class="text-center mt-5">Paso <?php echo $card5->orden; ?></h5>
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

            <h3 class="text-center mb-5 btn-verde">Comentarios: </h3>
            <?php
            foreach ($dataProvider->getModels() as $card9) 
            {
                //echo "$card9->receta_id";
                if ($_GET["id"]==$card9->id)
                {
                    $modeloComentario = RecetaComentarios::find()->orderBy(['fechahora' => SORT_DESC,])->where(['receta_id' =>$card9->id])->all();
                    
                    foreach ($modeloComentario as $card10)
                    {
                        //NOMBRE DE USUARIO DEL COMENTARIO
                        $modeloUsuario=Usuario::find()->select('nombre')->where(['id' =>  $card10->usuario_id])->all();
                        foreach ($modeloUsuario as $card11)
                        {
                            ?>
                            <div class="card mt-5">
                            <h5 class="card-header"><?php echo $card11->nombre?></h5>
                            <div class="card-body">
                            <?php
                        }
                    ?>
                    
                        <h5 class="card-title"><?php echo $card10->texto?></h5>
                        <p class="card-text"><?php echo $card10->fechahora?></p>
                      </div>
                    </div>
                    <?php
                    }?>
                    <div class="receta-comentarios-form">
                    
                <?php $form = ActiveForm::begin(['action'=>'?r=site/createcomentario']); ?>
                <?php $modeloc = new RecetaComentarios(); ?>
                <?= $form->field($modeloc, 'receta_id')->hiddenInput(['value'=>$_GET["id"]])->label(false) ?>

                <?= $form->field($modeloc, 'usuario_id')->hiddenInput(['value'=>Yii::$app->user->identity->id ])->label(false) ?>

                <?= $form->field($modeloc, 'fechahora')->hiddenInput(['value'=> date("Y-m-d H:i:s")])->label(false) ?>

                <?= $form->field($modeloc, 'texto')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Comentar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

                    
                    
                    
                    <?php
                }
            }
            ?>

            <?php
        }
        else {?>
            <button class="btn bg-danger w-100">La receta no existe.</button>
        <?php } ?>
    </div>
  </div>
</div>
</body>
