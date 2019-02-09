<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prowadzacy".
 *
 * @property int $id_prowadzacego
 * @property string $imie_prowadzacego
 * @property string $nazwisko_prowadzacego
 * @property string $jednostka_organizacyjna
 * @property string $stanowisko
 * @property string $adres_email
 * @property string $adres_www
 *
 * @property EMaterialyProwadzacy[] $eMaterialyProwadzacies
 * @property RealizacjaProwadzacy[] $realizacjaProwadzacies
 */
class Prowadzacy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prowadzacy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imie_prowadzacego', 'nazwisko_prowadzacego', 'jednostka_organizacyjna', 'stanowisko', 'adres_email', 'adres_www'], 'required'],
            [['imie_prowadzacego', 'nazwisko_prowadzacego', 'jednostka_organizacyjna', 'stanowisko', 'adres_email', 'adres_www'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_prowadzacego' => 'Id Prowadzacego',
            'imie_prowadzacego' => 'Imie Prowadzacego',
            'nazwisko_prowadzacego' => 'Nazwisko Prowadzacego',
            'jednostka_organizacyjna' => 'Jednostka Organizacyjna',
            'stanowisko' => 'Stanowisko',
            'adres_email' => 'Adres Email',
            'adres_www' => 'Adres Www',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEMaterialyProwadzacy()
    {
        return $this->hasMany(EMaterialyProwadzacy::className(), ['id_prowadzacego' => 'id_prowadzacego']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealizacjaProwadzacy()
    {
        return $this->hasMany(RealizacjaProwadzacy::className(), ['id_prowadzacego' => 'id_prowadzacego']);
    }
}
