<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rodzaj_zajec_realizacja".
 *
 * @property int $id_rodzaj_real
 * @property int $id_rodzaj_zajec
 * @property int $id_realizacji
 *
 * @property Realizacja $realizacji
 * @property RodzajZajec $rodzajZajec
 */
class RodzajZajecRealizacja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rodzaj_zajec_realizacja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_rodzaj_zajec', 'id_realizacji'], 'required'],
            [['id_rodzaj_zajec', 'id_realizacji'], 'integer'],
            [['id_realizacji'], 'exist', 'skipOnError' => true, 'targetClass' => Realizacja::className(), 'targetAttribute' => ['id_realizacji' => 'id_realizacji']],
            [['id_rodzaj_zajec'], 'exist', 'skipOnError' => true, 'targetClass' => RodzajZajec::className(), 'targetAttribute' => ['id_rodzaj_zajec' => 'id_rodzaj_zajec']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_rodzaj_real' => 'Id Rodzaj Real',
            'id_rodzaj_zajec' => 'Id Rodzaj Zajec',
            'id_realizacji' => 'Id Realizacji',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealizacja()
    {
        return $this->hasOne(Realizacja::className(), ['id_realizacji' => 'id_realizacji']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRodzajZajec()
    {
        return $this->hasOne(RodzajZajec::className(), ['id_rodzaj_zajec' => 'id_rodzaj_zajec']);
    }
}
