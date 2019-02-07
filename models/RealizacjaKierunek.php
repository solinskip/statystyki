<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "realizacja_kierunek".
 *
 * @property int $id_real_kieru
 * @property int $id_kierunku
 * @property int $id_realizacji
 *
 * @property Kierunek $kierunku
 * @property Realizacja $realizacji
 */
class RealizacjaKierunek extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'realizacja_kierunek';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kierunku', 'id_realizacji'], 'required'],
            [['id_kierunku', 'id_realizacji'], 'integer'],
            [['id_kierunku'], 'exist', 'skipOnError' => true, 'targetClass' => Kierunek::className(), 'targetAttribute' => ['id_kierunku' => 'id_kierunku']],
            [['id_realizacji'], 'exist', 'skipOnError' => true, 'targetClass' => Realizacja::className(), 'targetAttribute' => ['id_realizacji' => 'id_realizacji']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_real_kieru' => 'Id Real Kieru',
            'id_kierunku' => 'Id Kierunku',
            'id_realizacji' => 'Id Realizacji',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKierunku()
    {
        return $this->hasOne(Kierunek::className(), ['id_kierunku' => 'id_kierunku']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealizacji()
    {
        return $this->hasOne(Realizacja::className(), ['id_realizacji' => 'id_realizacji']);
    }
}
