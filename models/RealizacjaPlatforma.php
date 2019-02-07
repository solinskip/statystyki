<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "realizacja_platforma".
 *
 * @property int $id_real_plat
 * @property int $id_realizacji
 * @property int $id_platformy
 *
 * @property Platforma $platformy
 * @property Realizacja $realizacji
 */
class RealizacjaPlatforma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'realizacja_platforma';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_realizacji', 'id_platformy'], 'required'],
            [['id_realizacji', 'id_platformy'], 'integer'],
            [['id_platformy'], 'exist', 'skipOnError' => true, 'targetClass' => Platforma::className(), 'targetAttribute' => ['id_platformy' => 'id_platformy']],
            [['id_realizacji'], 'exist', 'skipOnError' => true, 'targetClass' => Realizacja::className(), 'targetAttribute' => ['id_realizacji' => 'id_realizacji']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_real_plat' => 'Id Real Plat',
            'id_realizacji' => 'Id Realizacji',
            'id_platformy' => 'Id Platformy',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlatformy()
    {
        return $this->hasOne(Platforma::className(), ['id_platformy' => 'id_platformy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealizacji()
    {
        return $this->hasOne(Realizacja::className(), ['id_realizacji' => 'id_realizacji']);
    }
}
