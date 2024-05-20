<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "telefonosactores".
 *
 * @property int $idtelefono
 * @property int|null $idactores
 * @property string|null $telefono
 *
 * @property Actores $idactores0
 */
class Telefonosactores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telefonosactores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idactores'], 'integer'],
            [['telefono'], 'string', 'max' => 12],
            [['idactores'], 'unique'],
            [['telefono'], 'unique'],
            [['idactores'], 'exist', 'skipOnError' => true, 'targetClass' => Actores::class, 'targetAttribute' => ['idactores' => 'idactores']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtelefono' => 'Idtelefono',
            'idactores' => 'Idactores',
            'telefono' => 'Telefono',
        ];
    }

    /**
     * Gets query for [[Idactores0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdactores0()
    {
        return $this->hasOne(Actores::class, ['idactores' => 'idactores']);
    }
}
