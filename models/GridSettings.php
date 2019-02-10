<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grid_settings".
 *
 * @property int $id
 * @property int $user_id
 * @property string $settings
 * @property string $created_at
 */
class GridSettings extends \yii\db\ActiveRecord
{
    //virtual variable
    public $columnsOn;
    public $columnsOff;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grid_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'settings'], 'required'],
            [['user_id'], 'integer'],
            [['settings'], 'string'],
            [['columnsOn', 'columnsOff', 'created_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Nazwa użytkownika',
            'name' => 'Nazwa szablonu',
            'settings' => 'Kolumny',
            'columnsOn' => 'Kolumny wybrane',
            'columnsOff' => 'Kolumny ukryte',
            'created_at' => 'Utworzono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function visibleColumn($columnName)
    {
        if (Yii::$app->request->get('templateId') !== null) {
            $settings = GridSettings::findOne(Yii::$app->request->get('templateId'));
            $settings = json_decode($settings->settings, true);
            $visibleColumns = explode(',', $settings['columns']);

            return in_array($columnName, $visibleColumns);
        }

        return true;
    }

    /**
     * Item list form sortable widget
     *
     * @return array
     */
    public static function getColumnItems()
    {
        return [
            'nazwa_projektu' => ['content' => Realizacja::attributeLabels()['nazwa_projektu']],
            'liczba_godzin' => ['content' => Realizacja::attributeLabels()['liczba_godzin']],
            'start_kursu' => ['content' => Realizacja::attributeLabels()['start_kursu']],
            'koniec_kursu' => ['content' => Realizacja::attributeLabels()['koniec_kursu']],
            'opis' => ['content' => Realizacja::attributeLabels()['opis']],
            'imie_prowadzacego' => ['content' => Prowadzacy::attributeLabels()['imie_prowadzacego']],
            'nazwisko_prowadzacego' => ['content' => Prowadzacy::attributeLabels()['nazwisko_prowadzacego']],
            'stanowisko_prowadzacego' => ['content' => Prowadzacy::attributeLabels()['stanowisko']],
            'adres_email_prowadzacego' => ['content' => Prowadzacy::attributeLabels()['adres_email']],
            'nazwa_platformy' => ['content' => Platforma::attributeLabels()['nazwa_platformy']],
            'nazwa_zajec_rodzaj' => ['content' => RodzajZajec::attributeLabels()['nazwa_zajec']],
            'liczba_godzin_rodzaj' => ['content' => RodzajZajec::attributeLabels()['liczba_godzin']],
            'rodzaj_e_ematerialy' => ['content' => EMaterialy::attributeLabels()['rodzaj']],
            'nazwa_e_ematerialy' => ['content' => EMaterialy::attributeLabels()['nazwa']],
            'dziedzina_e_ematerialy' => ['content' => EMaterialy::attributeLabels()['dziedzina']],
            'opis_e_ematerialy' => ['content' => EMaterialy::attributeLabels()['opis']],
            'nazwa_kierunku' => ['content' => Kierunek::attributeLabels()['nazwa_kierunku']],
            'nazwa_wydzialu' => ['content' => Wydzial::attributeLabels()['nazwa_wydzialu']]
        ];
    }
}