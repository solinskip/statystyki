<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kierunek".
 *
 * @property int $id_kierunku
 * @property int $id_wydzialu
 * @property string $nazwa_kierunku
 *
 * @property Wydzial $wydzialu
 * @property RealizacjaKierunek[] $realizacjaKieruneks
 */
class Kierunek extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kierunek';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_wydzialu', 'nazwa_kierunku'], 'required'],
            [['id_wydzialu'], 'integer'],
            [['nazwa_kierunku'], 'string', 'max' => 60],
            [['id_wydzialu'], 'exist', 'skipOnError' => true, 'targetClass' => Wydzial::className(), 'targetAttribute' => ['id_wydzialu' => 'id_wydzialu']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kierunku' => 'Id Kierunku',
            'id_wydzialu' => 'Id Wydzialu',
            'nazwa_kierunku' => 'Nazwa Kierunku',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWydzialu()
    {
        return $this->hasOne(Wydzial::className(), ['id_wydzialu' => 'id_wydzialu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealizacjaKieruneks()
    {
        return $this->hasMany(RealizacjaKierunek::className(), ['id_kierunku' => 'id_kierunku']);
    }
}
