<?php
namespace app\models;

use Yii;
use yii\base\Model;

class ResetPassword extends Model
{
    public $email; 

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'required', 'message' => 'El correo electrónico no puede estar en blanco.'], 
            ['email', 'email'], 
            [
                'email', 'exist',
                'targetClass' => '\app\models\Jugadores',
                'message' => 'No hay ningún usuario con esta dirección de correo electrónico.'
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Correo electrónico', // Cambia 'correo' a 'email'
        ];
    }

    /**
     * Sends a test email.
     * @return boolean whether the email was sent
     */
    // En tu modelo (ResetPassword o cualquier otro)
    public function sendEmail($template)
    {
        // Obtener el nombre del usuario en base al método establecido - getNombreUsuario
        $nombreUsuario = $this->getNombreUsuario();

        if ($this->validate()) {
            // Configurar y enviar el correo de prueba
            $result = Yii::$app->mailer->compose()
                ->setTo($this->email) // Cambia 'correo' a 'email'
                ->setFrom(['admin@example.com' => 'EcoPlayas'])
                ->setSubject('Restablece tu contraseña de EcoPlayas')
                ->setHtmlBody($this->generateEmailContent($nombreUsuario, $template))
                ->send();

            if ($result) {
                return true; // El correo electrónico se envió con éxito
            } else {
                Yii::error('No se pudo enviar el correo de prueba.');
                return false; // No se pudo enviar el correo electrónico
            }
        }
        return false; // La validación falló
    }

    protected function generateEmailContent($nombreUsuario, $template)
    {
        return Yii::$app->controller->renderPartial(
            '@app/views/plantilla-email/' . $template . '.php',
            [
                'nombreUsuario' => $nombreUsuario,
                'email' => $this->email, // Cambia 'correo' a 'email'

            ]
        );
    }

    // Método para obtener el usuario en base al correo electrónico
    protected function getNombreUsuario()
    {
        // Buscar el usuario en la base de datos por correo electrónico
        $usuario = Jugadores::findOne(['email' => $this->email]); // Cambia 'correo' a 'email'

        // Verificar si se encontró el usuario y si tiene el campo nombre
        if ($usuario !== null && isset($usuario->nombre)) {
            // Devolver el nombre del usuario encontrado
            return $usuario->nombre;
        } else {
            // Si no se encontró el usuario o el campo nombre está vacío, devolvera un valor predeterminado o lanzar una excepción según sea necesario
            return 'Usuario desconocido';
        }
    }

    
}
