<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "realizacja_e_materialy".
 *
 * @property int $id_e_mate_real
 * @property int $id_e_materialu
 * @property int $id_realizacji
 *
 * @property EMaterialy $eMaterialu
 * @property Realizacja $realizacji
 */
class RealizacjaEMaterialy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'realizacja_e_materialy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_e_materialu', 'id_realizacji'], 'required'],
            [['id_e_materialu', 'id_realizacji'], 'integer'],
            [['id_e_materialu'], 'exist', 'skipOnError' => true, 'targetClass' => EMaterialy::className(), 'targetAttribute' => ['id_e_materialu' => 'id_e_materialu']],
            [['id_realizacji'], 'exist', 'skipOnError' => true, 'targetClass' => Realizacja::className(), 'targetAttribute' => ['id_realizacji' => 'id_realizacji']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_e_mate_real' => 'Id E Mate Real',
            'id_e_materialu' => 'Id E Materialu',
            'id_realizacji' => 'Id Realizacji',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEMaterialu()
    {
        return $this->hasOne(EMaterialy::className(), ['id_e_materialu' => 'id_e_materialu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealizacji()
    {
        return $this->hasOne(Realizacja::className(), ['id_realizacji' => 'id_realizacji']);
    }
}
