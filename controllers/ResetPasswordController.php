<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ResetPassword;

class ResetPasswordController extends Controller
{
    /**
     * Displays the password reset request form.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new ResetPassword();

        if ($model->load(Yii::$app->request->post()) && $model->sendEmail('index')) {
            Yii::$app->session->setFlash('success', '<div class="alert alert-success res-send">Correo enviado con éxito.</div>');
        }

        return $this->render('index', [
            'model' => $model,
            'email' => $model->email,
        ]);
    }

    /**
     * Displays the password reset request form.
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new ResetPassword();

        if ($model->load(Yii::$app->request->post()) && $model->sendEmail('index')) {
            Yii::$app->session->setFlash('success', '<div class="alert alert-success res-send">Correo enviado con éxito.</div>');
            return $this->goHome();
        }

        return $this->render('index', [
            'model' => $model,
            'email' => $model->email,

        ]);
    }


    /**
     * Resets password.
     * @return mixed
     */
    public function actionResetPassword($token)
    {
        $model = new ResetPassword($token);

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');
            return $this->goHome();
        }

        return $this->render('index', [
            'email' => $model->email,
            'model' => $model,

        ]);
    }


    public function actionSendEmail()
    {
        $model = new ResetPassword();
        $model->email = Yii::$app->request->post('email');

        if ($model->sendEmail('index')) {
            Yii::$app->session->setFlash('success', '<div class="alert alert-success res-send animate__animated animate__fadeInDown">Correo enviado con éxito.</div>');
        } else {
            Yii::$app->session->setFlash('error', 'No se pudo enviar el correo de prueba.');
        }


        return $this->renderPartial('@app/views/plantilla-email/index.php', [
            'model' => $model,
            'email' => $model->email,
            'nombreUsuario' => $model->getNombreUsuario(),

        ]);
    }
}
