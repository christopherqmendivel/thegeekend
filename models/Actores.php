<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actores".
 *
 * @property int $idactores
 * @property string $dni
 * @property string $nombre
 * @property string $nombrepersonaje
 * @property string|null $tipo
 * @property string|null $nombrepelioserie
 * @property string|null $sinopsis
 * @property int|null $temporadas
 *
 * @property Asisten[] $asistens
 * @property Eventos[] $ideventos
 * @property Telefonosactores $telefonosactores
 */
class Actores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dni', 'nombre', 'nombrepersonaje'], 'required'],
            [['temporadas'], 'integer'],
            [['dni'], 'string', 'max' => 9],
            [['nombre', 'nombrepersonaje', 'nombrepelioserie'], 'string', 'max' => 50],
            [['tipo'], 'string', 'max' => 25],
            [['sinopsis'], 'string', 'max' => 350],
            [['dni'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idactores' => 'Idactores',
            'dni' => 'Dni',
            'nombre' => 'Nombre',
            'nombrepersonaje' => 'Nombrepersonaje',
            'tipo' => 'Tipo',
            'nombrepelioserie' => 'Nombrepelioserie',
            'sinopsis' => 'Sinopsis',
            'temporadas' => 'Temporadas',
        ];
    }

    /**
     * Gets query for [[Asistens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsistens()
    {
        return $this->hasMany(Asisten::class, ['idactores' => 'idactores']);
    }

    /**
     * Gets query for [[Ideventos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdeventos()
    {
        return $this->hasMany(Eventos::class, ['ideventos' => 'ideventos'])->viaTable('asisten', ['idactores' => 'idactores']);
    }

    /**
     * Gets query for [[Telefonosactores]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTelefonosactores()
    {
        return $this->hasOne(Telefonosactores::class, ['idactores' => 'idactores']);
    }
}
