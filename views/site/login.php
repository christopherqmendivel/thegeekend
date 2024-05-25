<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>

<div class="site-login w-100">
    <div class="overlay"></div>
    <div class="container h-100">
        <div class="row row-login">
            <div class="col d-flex justify-content-center">
                <!-- COLUMNA 2 - LOGIN -->
                <div class="animate__animated animate__fadeIn login-s2">
                    <h1 class="title">Identificarse</h1>
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                        'fieldConfig' => [
                            'template' => "{label}\n{input}\n{error}",
                            'labelOptions' => ['class' => 'col-form-label mr-lg-3'],
                            'inputOptions' => ['class' => 'form-control'],
                            'errorOptions' => ['class' => 'invalid-feedback'],
                        ],
                    ]); ?>

                    <?= $form->field($model, 'email')
                        ->textInput(
                            [
                                'autofocus' => true,
                                'class' => 'form-style',
                                'placeholder' => 'Tu correo'
                            ]
                        )
                    ?>

                    <?= $form->field($model, 'password')
                        ->passwordInput(
                            [
                                'autofocus' => true,
                                'class' => 'form-style',
                                'placeholder' => 'Tu contraseña'
                            ]
                        )
                    ?>


                    <div class="remember">
                        <?= $form->field($model, 'rememberMe')->checkbox(
                            [
                                'template' => "<div class=\"custom-control custom-checkbox\">{input}
                        {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            ]
                        )
                        ?>

                        

                    </div>

                    <div class="form-group">
                        <div class="p-0 d-flex">
                            <?= Html::submitButton(
                                'Iniciar sesión',
                                [
                                    'class' => 'btn btn-primary flex-grow-1 btn btn-clean',
                                    'name' => 'login-button',
                                ]
                            )
                            ?>
                        </div>
                    </div>
                    <?php
                        
                        echo Html::a(
                            '¿Has olvidado la contraseña?',
                            ['/reset-password/index'],
                            ['class' => 'reset-password']
                        );
                        ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>