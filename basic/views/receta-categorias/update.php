<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\RecetaCategorias */

//$this->title = 'Update Receta Categorias: ' . $model->id;
$this->title = 'Categorias de la receta: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Receta Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="receta-categorias-update">
    
<?php if (isset($_GET['msg'])){
            echo '<p class="btn btn-success w-100">';
            echo $_GET['msg'];
            echo '</p>';
        }?>

    <h1><?= Html::encode($this->title) ?></h1>
        <?php
     /*$this->render('_form', [
        'model' => $model,
    ]) */
     echo "<p>Categorias asociadas: </p>";
    foreach($categoriaReceta as $cat){
        echo "<p>".$cat->nombre." ". Html::a
        ('Eliminar',['delete','categoria_id'=>$cat->id,'receta_id'=>$model->id],
         ['class' => 'btn btn-danger', 'data' => [
            'confirm' => '¿Estás seguro que quieres quitar esta categoria de esta receta?',
            'method' => 'post',
        ],
        ])."</p>";
    }
    echo "<p>Puede añadir las siguientes categorias: </p>";
    foreach($arrayCategorias as $resto){
        echo  '<p>'. Html::a($resto->nombre, ['create','categoria_id'=>$resto->id,'receta_id'=>$model->id], ['class' => 'btn btn-success']).'</p>';
    }
    ?>

</div>
