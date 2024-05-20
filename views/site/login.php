<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>

<div class="site-login">
    <div class="container h-100">
        <div class="row">
            
            <!-- COLUMNA 2 - LOGIN -->
            <div class="col-6 animate__animated animate__fadeIn login-s2">
                
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

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="remember">
                    <?= $form->field($model, 'rememberMe')->checkbox(
                        [
                            'template' => "<div class=\"custom-control custom-checkbox\">{input}
                        {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        ]
                    )
                    ?>

                    <?php
                    // En tu vista (view)
                    echo Html::a(
                        '¿Has olvidado la contraseña?',
                        ['/reset-password/index'],
                        ['class' => 'reset-password']
                    );
                    ?>

                </div>

                <div class="form-group">
                    <div class="p-0 d-flex">
                        <?= Html::submitButton(
                            'Iniciar sesión',
                            [
                                'class' => 'btn btn-primary flex-grow-1 rounded-pill btn btn-clean',
                                'name' => 'login-button'
                            ]
                        )
                        ?>
                    </div>
                </div>

                <div class="s-3-login">
                    <span>
                        <?= Html::a(
                            'Eres nuevo?
                        <span class="login-register">¡Únete ahora!</span>',
                            ['/registro-usuarios/create'],
                            ['class' => 'redirect-register']
                        );
                        ?>
                    </span>



                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>