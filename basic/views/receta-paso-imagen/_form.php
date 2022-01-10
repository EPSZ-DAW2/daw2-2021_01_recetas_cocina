<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Receta;
use app\models\RecetaPaso;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\RecetaPasoImagen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="Receta-paso-imagen-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php 
        //obtenemos las recetas
        //$recetas=Receta::find()->all();
        $pasosrecetas=RecetaPaso::find()->all();
        
        //obtenemos un array mapeado de nombres de recetas con su ID
        // $listPasoRecetas=ArrayHelper::map($pasosrecetas,'id', 'descripcion');
        $listRecetas=[];
        $pasosrecetasArray=[];

        $listPrueba=[];
        $listPrueba['id']=[];
        $listPrueba['texto']=[];


        foreach($pasosrecetas as $paso){
            $modeloreceta = Receta::find()->where(['id'=>$paso->receta_id])->one();
            array_push($listPrueba['id'],$paso->id);
            array_push($listPrueba['texto'],$paso->orden.')  Receta '.$paso->receta_id.'->'.$modeloreceta->nombre);
        }
        //$paso = RecetaPaso::find()->all();
        //print_r ($listRecetas);

        // var_dump($listPrueba['id'][0]);

        //$list=ArrayHelper::map($listPrueba,'id','texto');

        //var_dump($list);
        $i=0;
        for($i=0; $i<count($listPrueba['id']);$i++)
        {
            $lista[$i]=$listPrueba['id'][$i]." : ".$listPrueba['texto'][$i];
        }
        
        //seleccionable de paso receta
        echo $form->field($model, 'receta_paso_id')->dropDownList(
            $lista,
            ['prompt'=>'Seleccione el paso al que desea añadir la imagen...']
        )

    ?>

    <?= $form->field($model, 'orden')->textInput(['class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?php // $form->field($model, 'imagen')->textarea(['rows' => 6,'class'=> 'w-100 btn btn-verde  my-3']) ?>

    <?=  $form->field($model, 'imageFile')->fileInput(['class'=> 'w-100 btn btn-warning  my-3'])?>

    <?= $form->field($model, 'imagen')->hiddenInput(['class'=> 'w-100 btn btn-verde  my-3'])->label("") ?>


    <div class="form-group">
        <?= Html::submitButton('Subir', ['class' => 'btn btn-success w-100 my-3']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
