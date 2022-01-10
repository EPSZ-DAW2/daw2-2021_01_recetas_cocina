<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\models\Usuario;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100 " style="background-color: rgba(209,245,228,0.53);">
<?php $this->beginBody() ?>

<header>

    <?php
    NavBar::begin([
        //'brandLabel' => Html::img('@web/images/atras.png', ['alt' => Yii::$app->name="Aplicación de recetas", 'style' => 'height: 2rem; width: auto; top: 12px; left: 20px; position: absolute; border-radius:25px;']).Html::img('@web/images/atras.png', ['alt' => Yii::$app->name="Aplicación de recetas", 'style' => 'height: 2rem; width: auto; top: 12px; left: 20px; position: absolute; border-radius:25px;']),
        //'brandLabel' => '<img href="'.$rutaAtras.'" style="height: 2rem; width: auto;top: 12px; left: 20px;  position: absolute; border-radius:25px;" src="images/atras.png"/><img style="height: 2rem; width: auto;top: 12px; left: 60px;  position: absolute; border-radius:25px;" src="images/logo.png"/>',
        'brandLabel' =>  '<a href="'.Yii::$app->request->referrer.'">'.'<img style="height: 2rem; width: auto;top: 12px; left: 20px;  position: absolute; border-radius:25px;" src="images/atras.png"/></a><img style="height: 2rem; width: auto;top: 12px; left: 60px;  position: absolute; border-radius:25px;" src="images/logo.png"/>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'btn-toolbar navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    ?>
      <?php
    $navItem=[];

    if (Usuario::esUsuarioColaborador(Yii::$app->user->identity->id))
    {
        $navItem=[
            ['label' => 'Inicio', 'url' => ['/site/index']],
            [
                'label' => 'Catalogo',
                'items' => [
                    ['label' => 'Ingredientes', 'url' => ['/site/veringredientes']],
                    ['label' => 'Recetas', 'url' => ['/site/verrecetas']],
                    ['label' => 'Menus', 'url' => ['/site/vermenus']],
                    ['label' => 'Planificaciones', 'url' => ['/site/verplanificaciones']],
                    ['label' => 'Tiendas', 'url' => ['/site/vertiendas']],
                    ['label' => 'Categorias', 'url' => ['/site/vercategorias']],
                ],],
            [
                'label' => 'Mantenimiento Colaborador',
                'items' => [
                    ['label' => 'Recetas', 'url' => ['/receta/index']],
                    ['label' => 'Recetas - Categorias', 'url' => ['/categorias/index']],
                    ['label' => 'Recetas - Comentarios', 'url' => ['/receta-comentarios/index']],
                    ['label' => 'Menus', 'url' => ['/menu/index']],
                    ['label' => 'Menus-Recetas', 'url' => ['/menureceta/index']],
                    ['label' => 'Planificaciones Menus', 'url' => ['/planificacionmenu/index']],
                    ['label' => 'Planificaciones', 'url' => ['/planificacion/index']],
                ],]

        ];
    }
    elseif (Usuario::esUsuarioTienda(Yii::$app->user->identity->id))
    {
        $navItem=[
            ['label' => 'Inicio', 'url' => ['/site/index']],
            [
                'label' => 'Catalogo',
                'items' => [
                    ['label' => 'Ingredientes', 'url' => ['/site/veringredientes']],
                    ['label' => 'Recetas', 'url' => ['/site/verrecetas']],
                    ['label' => 'Menus', 'url' => ['/site/vermenus']],
                    ['label' => 'Planificaciones', 'url' => ['/site/verplanificaciones']],
                    ['label' => 'Tiendas', 'url' => ['/site/vertiendas']],
                    ['label' => 'Categorias', 'url' => ['/site/vercategorias']],

                ],],
            ['label' => 'Mantenimiento Tienda y ofertas', 'url' => ['/tienda/index']],
        ];
    }
    elseif (Usuario::esUsuarioAdministrador(Yii::$app->user->identity->id))
    {
        $navItem=[
            ['label' => 'Inicio', 'url' => ['/site/index']],
            [
                'label' => 'Catalogo',
                'items' => [
                    ['label' => 'Ingredientes', 'url' => ['/site/veringredientes']],
                    ['label' => 'Recetas', 'url' => ['/site/verrecetas']],
                    ['label' => 'Menus', 'url' => ['/site/vermenus']],
                    ['label' => 'Planificaciones', 'url' => ['/site/verplanificaciones']],
                    ['label' => 'Tiendas', 'url' => ['/site/vertiendas']],
                    ['label' => 'Categorias', 'url' => ['/site/vercategorias']],
                ],],
            [
                'label' => 'Mantenimiento Administrador',
                'items' => [
                    ['label' => 'Categorias', 'url' => ['/categorias/index']],
                    ['label' => 'Ingredientes', 'url' => ['/ingrediente/index']],
                    ['label' => 'Recetas-Ingredientes', 'url' => ['/recetaingrediente/index']],
                    ['label' => 'Recetas', 'url' => ['/receta/index']],
                    ['label' => 'Recetas - Pasos', 'url' => ['/receta-paso/index']],
                    ['label' => 'Recetas - Categorias', 'url' => ['/categorias/index']],
                    ['label' => 'Recetas - Comentarios', 'url' => ['/receta-comentarios/index']],
                    ['label' => 'Recetas - Fotos', 'url' => ['/receta-paso-imagen/index']],
                    ['label' => 'Menus-Recetas', 'url' => ['/menureceta/index']],
                    ['label' => 'Planificaciones Menus', 'url' => ['/planificacionmenu/index']],
                    ['label' => 'Planificaciones', 'url' => ['/planificacion/index']],
                    ['label' => 'Menus', 'url' => ['/menu/index']],
                    ['label' => 'Tiendas', 'url' => ['/tienda/index']],
                    ['label' => 'Tiendas-Ofertas', 'url' => ['/tiendaoferta/index']],
                    ['label' => 'Usuarios', 'url' => ['/usuario/index']],
                    ['label' => 'Copia de seguridad', 'url' => ['/copia/index']],
                ],]

            ];

    }

   if(Yii::$app->user->isGuest)
   {
        //array_push($navItem, ['label' => 'Iniciar Sesión', 'url' => ['/site/login']], ['label' => 'Registro', 'url' => ['/site/register']]);
       array_push($navItem,'<li class="text-center " style="margin-left: 10px; margin-right: 10px;" >'. Html::beginForm(['/site/login'], 'post', ['class' => 'form-inline ']). Html::submitButton('Iniciar Sesión',['class' => 'ml-5 text-center p-1 mt-1 btn btn-verde text-black logout']). Html::endForm(). '</li>');
       array_push($navItem,'<li class="text-center" style="margin-left: 10px; margin-right: 10px;">'. Html::beginForm(['/site/register'], 'post', ['class' => 'form-inline ']). Html::submitButton('Registrarse',['class' => 'ml-5 text-center p-1 mt-1 btn btn-verde text-black logout']). Html::endForm(). '</li>');

   }
   else
   {
        array_push($navItem,'<li class="text-center">'. Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline ']). Html::submitButton('Cerrar Sesión (' . Yii::$app->user->identity->nombre . ')',['class' => ' text-center p-1 mt-1 btn btn-verde text-black logout']). Html::endForm(). '</li>');
   }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        'items' => $navItem
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">



    <div class="container-fluid mt-5 pt-3 ">
    <?php //<div class="container mt-5 pt-3 "> desactivar para todo menos el index ?>


        <div style="mt-2"><?= Breadcrumbs::widget([
            'homeLink' => [
                'label' => 'Inicio',
                'url' => '/daw2-2021_01_recetas_cocina/basic/web/',
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        </div>
        <?= Alert::widget() ?>

        <?= $content ?>
    </div>

</main>

<footer class="footer mt-auto py-3 " style="background-color: #c9e0c1; border-radius:25px" >
    <div class="container">
        <p class="text-center">&copy; Daw2 -- 4ºGIISI -- USAL  <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
