<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rodzaj_zajec".
 *
 * @property int $id_rodzaj_zajec
 * @property string $nazwa_zajec
 * @property int $liczba_godzin
 *
 * @property RodzajZajecRealizacja[] $rodzajZajecRealizacjas
 */
class RodzajZajec extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rodzaj_zajec';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nazwa_zajec', 'liczba_godzin'], 'required'],
            [['liczba_godzin'], 'integer'],
            [['nazwa_zajec'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_rodzaj_zajec' => 'Id Rodzaj Zajec',
            'nazwa_zajec' => 'Nazwa Zajec',
            'liczba_godzin' => 'Liczba Godzin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRodzajZajecRealizacjas()
    {
        return $this->hasMany(RodzajZajecRealizacja::className(), ['id_rodzaj_zajec' => 'id_rodzaj_zajec']);
    }
}
