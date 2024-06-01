<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer contraseña</title>
    <style>
        h1 {
            font-size: 40px;
            text-align: center;
        }

        p {
            font-size: 14px;
            color: black !important;
        }

        .btn {
            color: white !important;
            background: #0087ff;
            text-decoration: none;
            text-transform: uppercase;
            padding: .5rem 5rem;
            display: flex;
            justify-content: center;
            width: max-content;
            border-radius: 2rem;
            font-weight: 700;
            margin: 0 auto;
            max-width: 6rem;
        }

        .container {
            width: 100%;
            max-width: 480px;
            margin: 0 auto;
        }

        .logo-email {
            width: 50px !important;
        }

        .logo {
            display: flex;
            justify-content: center;
            width: 200px;
            height: 200px;
            margin: 0 auto;
        }

        .logo-pub {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo-container">
            <!--<div class="logo">
            Cambia esto por un logo propio al igual que el contenido    
            <img src="https://i.ibb.co/d7vj9ch/logo.png" class="logo-pub" alt="Logo EcoPlayas">
            </div> -->


        </div>
        <div class="info">
            <h1>Hola, <?php echo $nombreUsuario ?>:</h1>
            <p>
                ¿No puedes acceder a tu cuenta de EcoPlayas? No pasa nada, podemos ayudarte. Haz clic en el botón a continuación para restablecer tu contraseña.
            </p>

            <?= Html::a(
                'Restablecer contraseña',
                Yii::$app->urlManager->createAbsoluteUrl(['confirmar-password/reset-password', 'email' => $email]),
                ['class' => 'btn']
            )
            ?>
            <p>
                Al restablecer la contraseña, también confirmarás el correo asociado a tu cuenta.
            </p>
            <p>
                Si no has solicitado ningún restablecimiento, puedes ignorar este mensaje con total tranquilidad.
            </p>
            <p>

                <span>Gracias por apoyarnos,</span>
                <br <span>El equipo de EcoPlayas</span>
            </p>

        </div>
    </div>
</body>

</html>
