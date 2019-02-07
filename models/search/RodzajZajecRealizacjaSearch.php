<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RodzajZajecRealizacja;

/**
 * RodzajZajecRealizacjaSearch represents the model behind the search form about `app\models\RodzajZajecRealizacja`.
 */
class RodzajZajecRealizacjaSearch extends RodzajZajecRealizacja
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rodzaj_real', 'id_rodzaj_zajec', 'id_realizacji'], 'integer'],
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
        $query = RodzajZajecRealizacja::find();

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
            'id_rodzaj_real' => $this->id_rodzaj_real,
            'id_rodzaj_zajec' => $this->id_rodzaj_zajec,
            'id_realizacji' => $this->id_realizacji,
        ]);

        return $dataProvider;
    }
}
