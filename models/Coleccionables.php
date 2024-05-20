<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coleccionables".
 *
 * @property int $idcolecc
 * @property string $nombre
 * @property string $material
 * @property string $edicion
 * @property int|null $tomo
 * @property string|null $talla
 * @property float|null $medida
 * @property float $precio
 *
 * @property Eventos[] $ideventos
 * @property Venden[] $vendens
 */
class Coleccionables extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coleccionables';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'material', 'edicion', 'precio'], 'required'],
            [['tomo'], 'integer'],
            [['medida', 'precio'], 'number'],
            [['nombre'], 'string', 'max' => 100],
            [['material', 'edicion'], 'string', 'max' => 25],
            [['talla'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcolecc' => 'Idcolecc',
            'nombre' => 'Nombre',
            'material' => 'Material',
            'edicion' => 'Edicion',
            'tomo' => 'Tomo',
            'talla' => 'Talla',
            'medida' => 'Medida',
            'precio' => 'Precio',
        ];
    }

    /**
     * Gets query for [[Ideventos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdeventos()
    {
        return $this->hasMany(Eventos::class, ['ideventos' => 'ideventos'])->viaTable('venden', ['idcolecc' => 'idcolecc']);
    }

    /**
     * Gets query for [[Vendens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendens()
    {
        return $this->hasMany(Venden::class, ['idcolecc' => 'idcolecc']);
    }
}
