<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecetaCategorias */

$this->title = 'Update Receta Categorias: ' . $model->id;
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

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
