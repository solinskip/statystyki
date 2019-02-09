<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Realizacja;

/**
 * RealizacjaSearch represents the model behind the search form about `app\models\Realizacja`.
 */
class RealizacjaSearch extends Realizacja
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_realizacji', 'liczba_godzin'], 'integer'],
            [['nazwa_projektu', 'start_kursu', 'koniec_kursu', 'opis',
                'imie_prowadzacego', 'nazwisko_prowadzacego', 'stanowisko_prowadzacego', 'adres_email_prowadzacego',
                'nazwa_platformy',
                'nazwa_zajec_rodzaj', 'liczba_godzin_rodzaj',
                'rodzaj_e_materialy', 'nazwa_e_materialy', 'dziedzina_e_materialy', 'opis_e_materialy',
                'nazwa_kierunku',
                'nazwa_wydzialu'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Realizacja::find()->groupBy('nazwa_projektu');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //prowadzacy
        $dataProvider->sort->attributes['imie_prowadzacego'] = [
            'asc' => ['prowadzacy.imie_prowadzacego' => SORT_ASC],
            'desc' => ['prowadzacy.imie_prowadzacego' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['nazwisko_prowadzacego'] = [
            'asc' => ['prowadzacy.nazwisko_prowadzacego' => SORT_ASC],
            'desc' => ['prowadzacy.nazwisko_prowadzacego' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['stanowisko_prowadzacego'] = [
            'asc' => ['prowadzacy.stanowisko' => SORT_ASC],
            'desc' => ['prowadzacy.stanowisko' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['adres_email_prowadzacego'] = [
            'asc' => ['prowadzacy.adres_email' => SORT_ASC],
            'desc' => ['prowadzacy.adres_email' => SORT_DESC]
        ];
        //platforma
        $dataProvider->sort->attributes['nazwa_platformy'] = [
            'asc' => ['platforma.nazwa_platformy' => SORT_ASC],
            'desc' => ['platforma.nazwa_platformy' => SORT_DESC]
        ];
        //rodzaj zajec
        $dataProvider->sort->attributes['nazwa_zajec_rodzaj'] = [
            'asc' => ['rodzaj_zajec.nazwa_zajec' => SORT_ASC],
            'desc' => ['rodzaj_zajec.nazwa_zajec' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['liczba_godzin_rodzaj'] = [
            'asc' => ['rodzaj_zajec.liczba_godzin' => SORT_ASC],
            'desc' => ['rodzaj_zajec.liczba_godzin' => SORT_DESC]
        ];
        //e_materialy
        $dataProvider->sort->attributes['rodzaj_e_materialy'] = [
            'asc' => ['e_materialy.rodzaj' => SORT_ASC],
            'desc' => ['e_materialy.rodzaj' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['nazwa_e_materialy'] = [
            'asc' => ['e_materialy.nazwa' => SORT_ASC],
            'desc' => ['e_materialy.nazwa' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['dziedzina_e_materialy'] = [
            'asc' => ['e_materialy.dziedzina' => SORT_ASC],
            'desc' => ['e_materialy.dziedzina' => SORT_DESC]
        ];
        $dataProvider->sort->attributes['opis_e_materialy'] = [
            'asc' => ['e_materialy.opis' => SORT_ASC],
            'desc' => ['e_materialy.opis' => SORT_DESC]
        ];
        //kierunek
        $dataProvider->sort->attributes['nazwa_kierunku'] = [
            'asc' => ['kierunek.nazwa_kierunku' => SORT_ASC],
            'desc' => ['kierunek.nazwa_kierunku' => SORT_DESC]
        ];
        //wydzial
        $dataProvider->sort->attributes['nazwa_wydzialu'] = [
            'asc' => ['wydzial.nazwa_wydzialu' => SORT_ASC],
            'desc' => ['wydzial.nazwa_wydzialu' => SORT_DESC]
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        //relations
        $query->joinWith(['realizacjaProwadzacy']);
        $query->joinWith(['realizacjaPlatforma']);
        $query->joinWith(['rodzajZajecRealizacja']);
        $query->joinWith(['realizacjaEMaterialy']);
        $query->joinWith(['realizacjaKierunek']);
        $query->join(
            'LEFT JOIN',
            'prowadzacy',
            '`prowadzacy`.`id_prowadzacego` = `realizacja_prowadzacy`.`id_prowadzacego`'
        );
        $query->join(
            'LEFT JOIN',
            'platforma',
            '`platforma`.`id_platformy` = `realizacja_platforma`.`id_platformy`'
        );
        $query->join(
            'LEFT JOIN',
            'rodzaj_zajec',
            '`rodzaj_zajec`.`id_rodzaj_zajec` = `rodzaj_zajec_realizacja`.`id_rodzaj_zajec`'
        );
        $query->join(
            'LEFT JOIN',
            'e_materialy',
            '`e_materialy`.`id_e_materialu` = `realizacja_e_materialy`.`id_e_materialu`'
        );
        $query->join(
            'LEFT JOIN',
            'kierunek',
            '`kierunek`.`id_kierunku` = `realizacja_kierunek`.`id_kierunku`'
        );
        $query->join(
            'LEFT JOIN',
            'wydzial',
            '`wydzial`.`id_wydzialu` = `kierunek`.`id_wydzialu`'
        );

        $query->andFilterWhere([
            'liczba_godzin' => $this->liczba_godzin,
            'start_kursu' => $this->start_kursu,
            'koniec_kursu' => $this->koniec_kursu,
            'koniec_kursu' => $this->koniec_kursu,
        ]);

        $query->andFilterWhere(['like', 'nazwa_projektu', $this->nazwa_projektu])
            ->andFilterWhere(['like', 'opis', $this->opis])
            ->andFilterWhere(['like', 'imie_prowadzacego', $this->imie_prowadzacego])
            ->andFilterWhere(['like', 'nazwisko_prowadzacego', $this->nazwisko_prowadzacego])
            ->andFilterWhere(['like', 'stanowisko', $this->stanowisko_prowadzacego])
            ->andFilterWhere(['like', 'adres_email', $this->adres_email_prowadzacego])
            ->andFilterWhere(['like', 'nazwa_platformy', $this->nazwa_platformy])
            ->andFilterWhere(['like', 'nazwa_zajec', $this->nazwa_zajec_rodzaj])
            ->andFilterWhere(['=', 'rodzaj_zajec.liczba_godzin', $this->liczba_godzin_rodzaj])
            ->andFilterWhere(['like', 'e_materialy.rodzaj', $this->rodzaj_e_materialy])
            ->andFilterWhere(['like', 'e_materialy.nazwa', $this->nazwa_e_materialy])
            ->andFilterWhere(['like', 'e_materialy.dziedzina', $this->dziedzina_e_materialy])
            ->andFilterWhere(['like', 'e_materialy.opis', $this->opis_e_materialy])
            ->andFilterWhere(['like', 'nazwa_kierunku', $this->nazwa_kierunku])
            ->andFilterWhere(['like', 'nazwa_wydzialu', $this->nazwa_wydzialu]);


        return $dataProvider;
    }
}
