<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "participan".
 *
 * @property int $idparticipan
 * @property int $idtorneos
 * @property int $idjugadores
 *
 * @property Jugadores $idjugadores0
 * @property Torneos $idtorneos0
 */
class Participan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'participan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idtorneos', 'idjugadores'], 'required'],
            [['idtorneos', 'idjugadores'], 'integer'],
            [['idtorneos', 'idjugadores'], 'unique', 'targetAttribute' => ['idtorneos', 'idjugadores']],
            [['idjugadores'], 'exist', 'skipOnError' => true, 'targetClass' => Jugadores::class, 'targetAttribute' => ['idjugadores' => 'idjugadores']],
            [['idtorneos'], 'exist', 'skipOnError' => true, 'targetClass' => Torneos::class, 'targetAttribute' => ['idtorneos' => 'idtorneos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idparticipan' => 'Idparticipan',
            'idtorneos' => 'Idtorneos',
            'idjugadores' => 'Idjugadores',
        ];
    }

    /**
     * Gets query for [[Idjugadores0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdjugadores0()
    {
        return $this->hasOne(Jugadores::class, ['idjugadores' => 'idjugadores']);
    }

    /**
     * Gets query for [[Idtorneos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdtorneos0()
    {
        return $this->hasOne(Torneos::class, ['idtorneos' => 'idtorneos']);
    }
}
