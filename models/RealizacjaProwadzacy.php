<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "realizacja_prowadzacy".
 *
 * @property int $id_real_prow
 * @property int $id_realizacji
 * @property int $id_prowadzacego
 *
 * @property Prowadzacy $prowadzacego
 * @property Realizacja $realizacji
 */
class RealizacjaProwadzacy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'realizacja_prowadzacy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_realizacji', 'id_prowadzacego'], 'required'],
            [['id_realizacji', 'id_prowadzacego'], 'integer'],
            [['id_prowadzacego'], 'exist', 'skipOnError' => true, 'targetClass' => Prowadzacy::className(), 'targetAttribute' => ['id_prowadzacego' => 'id_prowadzacego']],
            [['id_realizacji'], 'exist', 'skipOnError' => true, 'targetClass' => Realizacja::className(), 'targetAttribute' => ['id_realizacji' => 'id_realizacji']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_real_prow' => 'Id Real Prow',
            'id_realizacji' => 'Id Realizacji',
            'id_prowadzacego' => 'Id Prowadzacego',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProwadzacy()
    {
        return $this->hasOne(Prowadzacy::className(), ['id_prowadzacego' => 'id_prowadzacego']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealizacja()
    {
        return $this->hasOne(Realizacja::className(), ['id_realizacji' => 'id_realizacji']);
    }
}
