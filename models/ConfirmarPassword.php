<?php

namespace app\models;

use yii\db\ActiveRecord;

class ConfirmarPassword extends ActiveRecord
{
    public $new_password;
    public $confirm_password;
    const SCENARIO_RESET_PASSWORD = 'resetPassword';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jugadores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['new_password', 'confirm_password', 'email'], 'required', 'message' => 'Por favor ingresa una nueva contraseña'],
            ['email', 'email'],
            [['confirm_password'], 'compare', 'compareAttribute' => 'new_password', 'message' => 'Las contraseñas no coinciden'],
            ['new_password', 'string', 'min' => 8, 'tooShort' => 'La contraseña debe tener al menos 8 caracteres'],
            ['new_password', 'match', 'pattern' => '/[A-Z]/', 'message' => 'La contraseña debe contener al menos una letra mayúscula'],
            ['new_password', 'match', 'pattern' => '/[!@#$%^&*()\-_=+{};:,<.>]/', 'message' => 'La contraseña debe contener al menos un carácter especial'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'new_password' => 'Nueva Contraseña',
            'confirm_password' => 'Confirmar Contraseña',
            'email' => 'Correo Electrónico',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_RESET_PASSWORD] = ['new_password', 'confirm_password', 'email'];
        return $scenarios;
    }
}
