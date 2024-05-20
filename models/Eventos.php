<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eventos".
 *
 * @property int $ideventos
 * @property string $nombre
 * @property string $lugar
 * @property string $finicio
 * @property string $ffinal
 * @property int|null $idbs
 * @property int|null $idesmu
 *
 * @property Asisten[] $asistens
 * @property Actores[] $idactores
 * @property Bandassonoras $idbs0
 * @property Coleccionables[] $idcoleccs
 * @property Escenariosmusicales $idesmu0
 * @property Torneos[] $idtorneos
 * @property Organizan[] $organizans
 * @property Venden[] $vendens
 */
class Eventos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eventos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'lugar', 'finicio', 'ffinal'], 'required'],
            [['finicio', 'ffinal'], 'safe'],
            [['idbs', 'idesmu'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['lugar'], 'string', 'max' => 25],
            [['idbs', 'idesmu'], 'unique', 'targetAttribute' => ['idbs', 'idesmu']],
            [['idbs'], 'exist', 'skipOnError' => true, 'targetClass' => Bandassonoras::class, 'targetAttribute' => ['idbs' => 'idbs']],
            [['idesmu'], 'exist', 'skipOnError' => true, 'targetClass' => Escenariosmusicales::class, 'targetAttribute' => ['idesmu' => 'idesmu']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ideventos' => 'Ideventos',
            'nombre' => 'Nombre',
            'lugar' => 'Lugar',
            'finicio' => 'Finicio',
            'ffinal' => 'Ffinal',
            'idbs' => 'Idbs',
            'idesmu' => 'Idesmu',
        ];
    }

    /**
     * Gets query for [[Asistens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsistens()
    {
        return $this->hasMany(Asisten::class, ['ideventos' => 'ideventos']);
    }

    /**
     * Gets query for [[Idactores]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdactores()
    {
        return $this->hasMany(Actores::class, ['idactores' => 'idactores'])->viaTable('asisten', ['ideventos' => 'ideventos']);
    }

    /**
     * Gets query for [[Idbs0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdbs0()
    {
        return $this->hasOne(Bandassonoras::class, ['idbs' => 'idbs']);
    }

    /**
     * Gets query for [[Idcoleccs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdcoleccs()
    {
        return $this->hasMany(Coleccionables::class, ['idcolecc' => 'idcolecc'])->viaTable('venden', ['ideventos' => 'ideventos']);
    }

    /**
     * Gets query for [[Idesmu0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdesmu0()
    {
        return $this->hasOne(Escenariosmusicales::class, ['idesmu' => 'idesmu']);
    }

    /**
     * Gets query for [[Idtorneos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdtorneos()
    {
        return $this->hasMany(Torneos::class, ['idtorneos' => 'idtorneos'])->viaTable('organizan', ['ideventos' => 'ideventos']);
    }

    /**
     * Gets query for [[Organizans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizans()
    {
        return $this->hasMany(Organizan::class, ['ideventos' => 'ideventos']);
    }

    /**
     * Gets query for [[Vendens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendens()
    {
        return $this->hasMany(Venden::class, ['ideventos' => 'ideventos']);
    }
}
