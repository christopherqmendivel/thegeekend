<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asisten".
 *
 * @property int $idasisten
 * @property int $ideventos
 * @property int $idactores
 *
 * @property Actores $idactores0
 * @property Eventos $ideventos0
 */
class Asisten extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asisten';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ideventos', 'idactores'], 'required'],
            [['ideventos', 'idactores'], 'integer'],
            [['idactores', 'ideventos'], 'unique', 'targetAttribute' => ['idactores', 'ideventos']],
            [['idactores'], 'exist', 'skipOnError' => true, 'targetClass' => Actores::class, 'targetAttribute' => ['idactores' => 'idactores']],
            [['ideventos'], 'exist', 'skipOnError' => true, 'targetClass' => Eventos::class, 'targetAttribute' => ['ideventos' => 'ideventos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idasisten' => 'Idasisten',
            'ideventos' => 'Ideventos',
            'idactores' => 'Idactores',
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
