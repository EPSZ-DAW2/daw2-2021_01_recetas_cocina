<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Planificacion */

$this->title = Yii::t('app', 'Crear Planificación');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Planificaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planificacion-create">

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
