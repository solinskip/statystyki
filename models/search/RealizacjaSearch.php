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
            [['nazwa_projektu', 'start_kursu', 'koniec_kursu', 'opis'], 'safe'],
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
        $query = Realizacja::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_realizacji' => $this->id_realizacji,
            'liczba_godzin' => $this->liczba_godzin,
            'start_kursu' => $this->start_kursu,
            'koniec_kursu' => $this->koniec_kursu,
        ]);

        $query->andFilterWhere(['like', 'nazwa_projektu', $this->nazwa_projektu])
            ->andFilterWhere(['like', 'opis', $this->opis]);

        return $dataProvider;
    }
}
