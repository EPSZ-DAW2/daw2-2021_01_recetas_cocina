<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap5\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="container my-5  h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img
                                    src="images/login.jpg"
                                    alt="login form"
                                    class="img-fluid h-100" style="border-radius: 1rem 0 0 1rem;"
                            />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                            <?php $form = ActiveForm::begin([
                                        'id' => 'login-form',
                                        'layout' => 'horizontal',
                                        'fieldConfig' => [
                                            'template' => "{label}\n<div class=\"\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                            'labelOptions' => ['class' => 'my-3'],
                                        ],
                                    ]); ?>

                                    <div class="mb-3 pb-1 text-center">
                                        <span class="h1 fw-bold mb-0">Inicio de Sesión</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Introduzca su cuenta</h5>

                                    <div class="form-outline mb-4">
                                        <!-- <input type="email" id="form2Example17" class="form-control form-control-lg" /> -->
                                        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label("Nombre de Usuario") ?>
                                        <!-- <label class="form-label" for="form2Example17">Nombre de Usuario</label> -->
                                    </div>

                                    <div class="form-outline mb-4">
                                        <!-- <input type="password" id="form2Example27" class="form-control form-control-lg" /> -->
                                        <?= $form->field($model, 'password')->passwordInput()->label("Password") ?>
                                        <!-- <label class="form-label" for="form2Example27">Password</label>  -->
                                    </div>
                                    <div class="form-group">
                                        <div class="">
                                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary my-4 w-100', 'name' => 'login-button']) ?>
                                        </div>
                                    </div>
<!--                                     <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="button">Login</button>
                                    </div> -->

                                    
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">¿No tienes cuenta? <a href="../web/index.php?r=site%2Fregister" style="color: #393f81;">Registrate aqui</a></p>
                                    <a href="https://policies.google.com/terms?hl=es" class="small text-muted">Terms of use.</a>
                                    <a href="https://policies.google.com/privacy?hl=es" class="small text-muted">Privacy policy</a>
                                    <?php ActiveForm::end(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
