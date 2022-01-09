<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecetaComentarios */

$this->title = 'Crear un comentario';
$this->params['breadcrumbs'][] = ['label' => 'Comentarios de las recetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receta-comentarios-create">

<?php if (isset($_GET['msg'])){
            echo '<p class="btn btn-danger w-100">';
            echo $_GET['msg'];
            echo '</p>';
        }?>

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
