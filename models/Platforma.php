<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "platforma".
 *
 * @property int $id_platformy
 * @property string $nazwa_platformy
 *
 * @property RealizacjaPlatforma[] $realizacjaPlatformas
 */
class Platforma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'platforma';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nazwa_platformy'], 'required'],
            [['nazwa_platformy'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_platformy' => 'Id Platformy',
            'nazwa_platformy' => 'Nazwa Platformy',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealizacjaPlatformas()
    {
        return $this->hasMany(RealizacjaPlatforma::className(), ['id_platformy' => 'id_platformy']);
    }
}
