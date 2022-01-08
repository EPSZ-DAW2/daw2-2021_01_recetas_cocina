<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecetaComentarios */

$this->title = 'Update Receta Comentarios: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Receta Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="receta-comentarios-update">

<?php if (isset($_GET['msg'])){
            echo '<p class="btn btn-success w-100">';
            echo $_GET['msg'];
            echo '</p>';
        }?>

    <h1 class="tituloCrud"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
