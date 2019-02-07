<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RodzajZajec;

/**
 * RodzajZajecSearch represents the model behind the search form about `app\models\RodzajZajec`.
 */
class RodzajZajecSearch extends RodzajZajec
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rodzaj_zajec', 'liczba_godzin'], 'integer'],
            [['nazwa_zajec'], 'safe'],
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
        $query = RodzajZajec::find();

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
            'id_rodzaj_zajec' => $this->id_rodzaj_zajec,
            'liczba_godzin' => $this->liczba_godzin,
        ]);

        $query->andFilterWhere(['like', 'nazwa_zajec', $this->nazwa_zajec]);

        return $dataProvider;
    }
}
