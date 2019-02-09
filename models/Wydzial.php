<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wydzial".
 *
 * @property int $id_wydzialu
 * @property string $nazwa_wydzialu
 *
 * @property Kierunek[] $kieruneks
 */
class Wydzial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wydzial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nazwa_wydzialu'], 'required'],
            [['nazwa_wydzialu'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_wydzialu' => 'Id Wydzialu',
            'nazwa_wydzialu' => 'Nazwa Wydzialu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKierunek()
    {
        return $this->hasMany(Kierunek::className(), ['id_wydzialu' => 'id_wydzialu']);
    }
}
