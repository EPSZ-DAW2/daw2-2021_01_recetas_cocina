<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menureceta */

$this->title = Yii::t('app', 'Añadir receta a menú');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menurecetas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menureceta-create">

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
