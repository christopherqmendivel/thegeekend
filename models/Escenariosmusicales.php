<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "escenariosmusicales".
 *
 * @property int $idesmu
 * @property string $dni
 * @property string $nombre
 * @property string|null $nombregrupo
 * @property string|null $instrumento
 * @property string|null $categoria
 *
 * @property Eventos[] $eventos
 * @property Bandassonoras[] $idbs
 */
class Escenariosmusicales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'escenariosmusicales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dni', 'nombre'], 'required'],
            [['dni'], 'string', 'max' => 9],
            [['nombre'], 'string', 'max' => 50],
            [['nombregrupo', 'instrumento', 'categoria'], 'string', 'max' => 25],
            [['dni'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idesmu' => 'Idesmu',
            'dni' => 'Dni',
            'nombre' => 'Nombre',
            'nombregrupo' => 'Nombregrupo',
            'instrumento' => 'Instrumento',
            'categoria' => 'Categoria',
        ];
    }

    /**
     * Gets query for [[Eventos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Eventos::class, ['idesmu' => 'idesmu']);
    }

    /**
     * Gets query for [[Idbs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdbs()
    {
        return $this->hasMany(Bandassonoras::class, ['idbs' => 'idbs'])->viaTable('eventos', ['idesmu' => 'idesmu']);
    }
}
