<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "torneos".
 *
 * @property int $idtorneos
 * @property string $juego
 * @property string|null $modojuego
 * @property string|null $modalidad
 * @property string $fechahora
 *
 * @property Eventos[] $ideventos
 * @property Jugadores[] $idjugadores
 * @property Organizan[] $organizans
 * @property Participan[] $participans
 */
class Torneos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'torneos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['juego', 'fechahora'], 'required'],
            [['fechahora'], 'safe'],
            [['juego'], 'string', 'max' => 65],
            [['modojuego'], 'string', 'max' => 200],
            [['modalidad'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtorneos' => 'Idtorneos',
            'juego' => 'Juego',
            'modojuego' => 'Modojuego',
            'modalidad' => 'Modalidad',
            'fechahora' => 'Fechahora',
        ];
    }

    /**
     * Gets query for [[Ideventos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdeventos()
    {
        return $this->hasMany(Eventos::class, ['ideventos' => 'ideventos'])->viaTable('organizan', ['idtorneos' => 'idtorneos']);
    }

    /**
     * Gets query for [[Idjugadores]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdjugadores()
    {
        return $this->hasMany(Jugadores::class, ['idjugadores' => 'idjugadores'])->viaTable('participan', ['idtorneos' => 'idtorneos']);
    }

    /**
     * Gets query for [[Organizans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizans()
    {
        return $this->hasMany(Organizan::class, ['idtorneos' => 'idtorneos']);
    }

    /**
     * Gets query for [[Participans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParticipans()
    {
        return $this->hasMany(Participan::class, ['idtorneos' => 'idtorneos']);
    }
}
