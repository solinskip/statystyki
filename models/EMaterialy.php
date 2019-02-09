<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "e_materialy".
 *
 * @property int $id_e_materialu
 * @property string $rodzaj
 * @property string $nazwa
 * @property string $dziedzina
 * @property string $rodzaj_certyfikatu
 * @property string $data_utworzenia
 * @property string $data_modyfikacji
 * @property string $nr_wersji
 * @property string $opis
 *
 * @property EMaterialyProwadzacy[] $eMaterialyProwadzacies
 * @property RealizacjaEMaterialy[] $realizacjaEMaterialies
 */
class EMaterialy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'e_materialy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rodzaj', 'nazwa', 'dziedzina', 'rodzaj_certyfikatu', 'data_utworzenia', 'data_modyfikacji', 'nr_wersji', 'opis'], 'required'],
            [['data_utworzenia', 'data_modyfikacji'], 'safe'],
            [['opis'], 'string'],
            [['rodzaj', 'dziedzina', 'rodzaj_certyfikatu', 'nr_wersji'], 'string', 'max' => 60],
            [['nazwa'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_e_materialu' => 'Id E Materialu',
            'rodzaj' => 'Rodzaj',
            'nazwa' => 'Nazwa',
            'dziedzina' => 'Dziedzina',
            'rodzaj_certyfikatu' => 'Rodzaj Certyfikatu',
            'data_utworzenia' => 'Data Utworzenia',
            'data_modyfikacji' => 'Data Modyfikacji',
            'nr_wersji' => 'Nr Wersji',
            'opis' => 'Opis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEMaterialyProwadzacy()
    {
        return $this->hasMany(EMaterialyProwadzacy::className(), ['id_e_materialu' => 'id_e_materialu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealizacjaEMaterialies()
    {
        return $this->hasMany(RealizacjaEMaterialy::className(), ['id_e_materialu' => 'id_e_materialu']);
    }
}
