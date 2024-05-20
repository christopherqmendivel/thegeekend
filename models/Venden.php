<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venden".
 *
 * @property int $idvenden
 * @property int|null $ideventos
 * @property int|null $idcolecc
 *
 * @property Coleccionables $idcolecc0
 * @property Eventos $ideventos0
 */
class Venden extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venden';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ideventos', 'idcolecc'], 'integer'],
            [['ideventos', 'idcolecc'], 'unique', 'targetAttribute' => ['ideventos', 'idcolecc']],
            [['idcolecc'], 'exist', 'skipOnError' => true, 'targetClass' => Coleccionables::class, 'targetAttribute' => ['idcolecc' => 'idcolecc']],
            [['ideventos'], 'exist', 'skipOnError' => true, 'targetClass' => Eventos::class, 'targetAttribute' => ['ideventos' => 'ideventos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idvenden' => 'Idvenden',
            'ideventos' => 'Ideventos',
            'idcolecc' => 'Idcolecc',
        ];
    }

    /**
     * Gets query for [[Idcolecc0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdcolecc0()
    {
        return $this->hasOne(Coleccionables::class, ['idcolecc' => 'idcolecc']);
    }

    /**
     * Gets query for [[Ideventos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdeventos0()
    {
        return $this->hasOne(Eventos::class, ['ideventos' => 'ideventos']);
    }
}
