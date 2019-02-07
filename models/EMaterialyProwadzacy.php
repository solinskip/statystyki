<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "e_materialy_prowadzacy".
 *
 * @property int $id_mater_prowadz
 * @property int $id_e_materialu
 * @property int $id_prowadzacego
 *
 * @property EMaterialy $eMaterialu
 * @property Prowadzacy $prowadzacego
 */
class EMaterialyProwadzacy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'e_materialy_prowadzacy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_e_materialu', 'id_prowadzacego'], 'required'],
            [['id_e_materialu', 'id_prowadzacego'], 'integer'],
            [['id_e_materialu'], 'exist', 'skipOnError' => true, 'targetClass' => EMaterialy::className(), 'targetAttribute' => ['id_e_materialu' => 'id_e_materialu']],
            [['id_prowadzacego'], 'exist', 'skipOnError' => true, 'targetClass' => Prowadzacy::className(), 'targetAttribute' => ['id_prowadzacego' => 'id_prowadzacego']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mater_prowadz' => 'Id Mater Prowadz',
            'id_e_materialu' => 'Id E Materialu',
            'id_prowadzacego' => 'Id Prowadzacego',
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
    public function getProwadzacego()
    {
        return $this->hasOne(Prowadzacy::className(), ['id_prowadzacego' => 'id_prowadzacego']);
    }
}
