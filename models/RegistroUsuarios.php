<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jugadores".
 *
 * @property int $idjugadores
 * @property string $dni
 * @property string $nick
 * @property string $nombre
 * @property string|null $nombregrupo
 * @property string $email
 * @property string $contrasena
 *
 * @property Torneos[] $idtorneos
 * @property Participan[] $participans
 */
class RegistroUsuarios extends \yii\db\ActiveRecord
{
    public $confirmarPassword;

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
            [['nick', 'nombre', 'email', 'password', 'confirmarPassword'], 'required'],
            [['dni'], 'string', 'max' => 9],
            [['nick', 'nombregrupo'], 'string', 'max' => 25],
            [['nombre', 'email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 255],
            [['nick'], 'unique'],
            ['confirmarPassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Las contraseñas no coinciden'],    

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idjugadores' => 'Idjugadores',
            'dni' => 'Dni',
            'nick' => 'Nick',
            'nombre' => 'Nombre',
            'nombregrupo' => 'Nombregrupo',
            'email' => 'Email',
            'password' => 'Contraseña',
        ];
    }

    /**
     * Gets query for [[Idtorneos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdtorneos()
    {
        return $this->hasMany(Torneos::class, ['idtorneos' => 'idtorneos'])->viaTable('participan', ['id' => 'id']);
    }

    /**
     * Gets query for [[Participans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParticipans()
    {
        return $this->hasMany(Participan::class, ['id' => 'id']);
    }

    /**
     * Registra un nuevo usuario.
     *
     * @param array $data Los datos del nuevo usuario.
     * @return bool True si el registro fue exitoso, false en caso contrario.
     */

     public function registrarUsuario($data)
     {   $this->nombre = $data['nombre'];
         $this->nick = $data['nick'];
         $this->email = $data['email'];
         $this->password = $data['password'];
 
         if ($this->save()) {
             return true;
         } else {
             return false;
         }
     }
 
 
 
     public function beforeSave($insert)
     {
         if (parent::beforeSave($insert)) {
             // Si el campo de la contraseña ha sido modificado, aseguramos que no sea nulo
             if ($this->isAttributeChanged('password') && !empty($this->password)) {
                 $this->password = trim($this->password);
             }
         }
         return parent::beforeSave($insert);
     }
}
