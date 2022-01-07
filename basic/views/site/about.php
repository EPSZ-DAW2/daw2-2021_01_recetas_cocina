<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">

    <?php
    $datos=[["Marcos Luengo Viñuela","descripcion", "correo"],["Nerea de Dios del Rio","descripcion", "correo"],["Fernando Jose Cofiño Gavito","descripcion", "correo"],["Victor Melado Barba","descripcion", "correo"],
        ["Manuel Pardal Mollón","descripcion", "correo"],["Pablo","descripcion", "correo"],["Elsa","descripcion", "correo"],["Sara","descripcion", "correo"]];?>

    <h1 class="tituloCrud"><?= "Participantes del Proyecto" ?></h1>
    <div class="row">
        <?php foreach ($datos as $usuario){?>
        <div class="card col-lg-4 my-3 text-center" style="border-radius: 25px;">
            <img class="w-50 mx-auto" src="images/usuario.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?=$usuario[0]?></h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?=$usuario[1]?></li>
                <li class="list-group-item"><?=$usuario[2]?></li>
            </ul>
        </div>
        <?php }?>
    </div>


</div>
