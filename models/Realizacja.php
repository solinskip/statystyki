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
    /**
     * {@inheritdoc}
     */
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
    public function getRealizacjaEMaterialies()
    {
        return $this->hasMany(RealizacjaEMaterialy::className(), ['id_realizacji' => 'id_realizacji']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealizacjaKieruneks()
    {
        return $this->hasMany(RealizacjaKierunek::className(), ['id_realizacji' => 'id_realizacji']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealizacjaPlatformas()
    {
        return $this->hasMany(RealizacjaPlatforma::className(), ['id_realizacji' => 'id_realizacji']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealizacjaProwadzacies()
    {
        return $this->hasMany(RealizacjaProwadzacy::className(), ['id_realizacji' => 'id_realizacji']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRodzajZajecRealizacjas()
    {
        return $this->hasMany(RodzajZajecRealizacja::className(), ['id_realizacji' => 'id_realizacji']);
    }
}
