<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bandassonoras".
 *
 * @property int $idbs
 * @property string $dni
 * @property string $nombre
 * @property string $premio
 *
 * @property Eventos[] $eventos
 * @property Escenariosmusicales[] $idesmus
 */
class Bandassonoras extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bandassonoras';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dni', 'nombre', 'premio'], 'required'],
            [['dni'], 'string', 'max' => 9],
            [['nombre'], 'string', 'max' => 50],
            [['premio'], 'string', 'max' => 60],
            [['dni'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idbs' => 'Idbs',
            'dni' => 'Dni',
            'nombre' => 'Nombre',
            'premio' => 'Premio',
        ];
    }

    /**
     * Gets query for [[Eventos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Eventos::class, ['idbs' => 'idbs']);
    }

    /**
     * Gets query for [[Idesmus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdesmus()
    {
        return $this->hasMany(Escenariosmusicales::class, ['idesmu' => 'idesmu'])->viaTable('eventos', ['idbs' => 'idbs']);
    }
}
