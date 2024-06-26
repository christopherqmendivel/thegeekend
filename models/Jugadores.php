<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "jugadores".
 *
 * @property int $idjugadores
 * @property string $dni
 * @property string $nick
 * @property string $nombre
 * @property string|null $nombregrupo
 * @property string $email
 * @property string $password
  * @property string $roles
 * @property Torneos[] $idtorneos
 * @property Participan[] $participans
 */
class Jugadores extends ActiveRecord implements IdentityInterface
{


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
            [['nick', 'nombre', 'email', 'password'], 'required'],
            [['dni'], 'string', 'max' => 9],
            [['nick', 'nombregrupo'], 'string', 'max' => 25],
            [['nombre', 'email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 255],
            [['roles'], 'string', 'max' => 10],
            [['nick'], 'unique'],
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
            'roles' => 'Roles',
        ];
    }

    /**
     * Gets query for [[Idtorneos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdtorneos()
    {
        return $this->hasMany(Torneos::class, ['idtorneos' => 'idtorneos'])->viaTable('participan', ['idjugadores' => 'idjugadores']);
    }

    /**
     * Gets query for [[Participans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParticipans()
    {
        return $this->hasMany(Participan::class, ['idjugadores' => 'idjugadores']);
    }

    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null; // Omitir si no se necesita autenticación basada en tokens
    }

    public function getId()
    {
        return $this->idjugadores;
    }

    public function getAuthKey()
    {
        // No hacemos nada aquí
    }

    public function validateAuthKey($authKey)
    {
        // No hacemos nada aquí
    }

    protected function getNombreUsuario()
    {
        $usuario = static::findOne(['email' => $this->email]);

        // Verificar si se encontró el usuario y si tiene el campo nombre
        if ($usuario !== null && isset($usuario->nombre)) {
            // Devolver el nombre del usuario encontrado
            return $usuario->nombre;
        } else {
            // Si no se encontró el usuario o el campo nombre está vacío, devolver un valor predeterminado o lanzar una excepción según sea necesario
            return 'Usuario desconocido';
        }
    }
}
