<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "realizacja".
 *
 * @property int $id_realizacji
 * @property string $nazwa_projektu
 * @property int $liczba_godzin
 * @property string $start_kursu
 * @property string $koniec_kursu
 * @property string $opis
 *
 * @property RealizacjaEMaterialy[] $realizacjaEMaterialies
 * @property RealizacjaKierunek[] $realizacjaKieruneks
 * @property RealizacjaPlatforma[] $realizacjaPlatformas
 * @property RealizacjaProwadzacy[] $realizacjaProwadzacies
 * @property RodzajZajecRealizacja[] $rodzajZajecRealizacjas
 */
class Realizacja extends \yii\db\ActiveRecord
{
    //virtual variable
    public $imie_prowadzacego;
    public $nazwisko_prowadzacego;
    public $stanowisko_prowadzacego;
    public $adres_email_prowadzacego;
    public $nazwa_platformy;
    public $nazwa_zajec_rodzaj;
    public $liczba_godzin_rodzaj;
    public $rodzaj_e_materialy;
    public $nazwa_e_materialy;
    public $dziedzina_e_materialy;
    public $opis_e_materialy;
    public $nazwa_kierunku;
    public $nazwa_wydzialu;

    public static function tableName()
    {
        return 'realizacja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nazwa_projektu', 'liczba_godzin', 'start_kursu', 'koniec_kursu', 'opis'], 'required'],
            [['liczba_godzin'], 'integer'],
            [['start_kursu', 'koniec_kursu'], 'safe'],
            [['opis'], 'string'],
            [['nazwa_projektu'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_realizacji' => 'Id Realizacji',
            'nazwa_projektu' => 'Nazwa Projektu',
            'liczba_godzin' => 'Liczba Godzin',
            'start_kursu' => 'Start Kursu',
            'koniec_kursu' => 'Koniec Kursu',
            'opis' => 'Opis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealizacjaEMaterialy()
    {
        return $this->hasMany(RealizacjaEMaterialy::className(), ['id_realizacji' => 'id_realizacji']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealizacjaKierunek()
    {
        return $this->hasMany(RealizacjaKierunek::className(), ['id_realizacji' => 'id_realizacji']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealizacjaPlatforma()
    {
        return $this->hasMany(RealizacjaPlatforma::className(), ['id_realizacji' => 'id_realizacji']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealizacjaProwadzacy()
    {
        return $this->hasMany(RealizacjaProwadzacy::className(), ['id_realizacji' => 'id_realizacji']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRodzajZajecRealizacja()
    {
        return $this->hasMany(RodzajZajecRealizacja::className(), ['id_realizacji' => 'id_realizacji']);
    }
}
