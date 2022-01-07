<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap5\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Copia de seguridad');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

<h1 class="text-center w-100 rounded btn-verde"><?= Html::encode($this->title) ?></h1>
    <h1><?php var_dump($msg);?></h1>
    <p>
        <?= Html::a(Yii::t('app', 'Hacer Copia de Seguridad'), ['copia'], ['class' => 'btn btn-verde mt-3']) ?>
        <?= Html::a(Yii::t('app', 'Restaurar Copia de Seguridad'), ['restaurarcopia'], ['class' => 'btn btn-danger mt-3']) ?>
    </p>

</div>
