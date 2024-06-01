<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ConfirmarPassword;

class ConfirmarPasswordController extends Controller
{

    public function actionIndex()
    {
        $model = new ConfirmarPassword();

        // Si se envía el formulario a través de POST
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Lógica para manejar el envío del formulario
            // Esto es donde puedes manejar el cambio de contraseña
        } else {
            // Si no se envía el formulario a través de POST
            // Puedes manejar la solicitud con los parámetros en la URL aquí
            $correoEncoded = Yii::$app->request->get('email');
            $correoDecoded = str_replace('%40', '@', $correoEncoded);
            $model->email = $correoDecoded;
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }


    public function actionResetPassword()
    {
        // Obtener el correo electrónico de la solicitud de la URL y decodificarlo
        $correoEncoded = Yii::$app->request->get('email');
        $correoDecoded = str_replace('%40', '@', $correoEncoded);

        // Buscar el usuario existente por correo electrónico
        $existingUser = ConfirmarPassword::findOne(['email' => $correoDecoded]);
        if (!$existingUser) {
            Yii::$app->session->setFlash('error', 'No se encontró un usuario con ese correo electrónico.');
            return $this->redirect(['site/login']); // Redirigir a la página de inicio de sesión u otra página según sea necesario
        }

        // Crear una instancia del modelo ConfirmarPassword con el usuario encontrado
        $model = $existingUser;
        $model->scenario = 'resetPassword';

        // Resto del código para restablecer la contraseña
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Verificar si la nueva contraseña coincide con la confirmación
            if ($model->new_password === $model->confirm_password) {
                // Actualizar la contraseña del usuario
                $model->password = $model->new_password;

                if ($model->save()) {
            Yii::$app->session->setFlash('success', '<div class="alert alert-success res-send animate__animated animate__fadeInDown">La contraseña se ha restablecido correctamente.</div>');
                    // Reiniciar el modelo para limpiar los campos del formulario
                    $model->new_password = null;
                    $model->confirm_password = null;
                } else {
                    Yii::$app->session->setFlash('error', 'Hubo un error al restablecer la contraseña.');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Las contraseñas no coinciden.');
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
