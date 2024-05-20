<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organizan".
 *
 * @property int $idparticipan
 * @property int $ideventos
 * @property int $idtorneos
 *
 * @property Eventos $ideventos0
 * @property Torneos $idtorneos0
 */
class Organizan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ideventos', 'idtorneos'], 'required'],
            [['ideventos', 'idtorneos'], 'integer'],
            [['ideventos', 'idtorneos'], 'unique', 'targetAttribute' => ['ideventos', 'idtorneos']],
            [['ideventos'], 'exist', 'skipOnError' => true, 'targetClass' => Eventos::class, 'targetAttribute' => ['ideventos' => 'ideventos']],
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
            'ideventos' => 'Ideventos',
            'idtorneos' => 'Idtorneos',
        ];
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
