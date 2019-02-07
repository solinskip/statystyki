<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EMaterialy;

/**
 * EMaterialySearch represents the model behind the search form about `app\models\EMaterialy`.
 */
class EMaterialySearch extends EMaterialy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_e_materialu'], 'integer'],
            [['rodzaj', 'nazwa', 'dziedzina', 'rodzaj_certyfikatu', 'data_utworzenia', 'data_modyfikacji', 'nr_wersji', 'opis'], 'safe'],
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
        $query = EMaterialy::find();

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
            'id_e_materialu' => $this->id_e_materialu,
            'data_utworzenia' => $this->data_utworzenia,
            'data_modyfikacji' => $this->data_modyfikacji,
        ]);

        $query->andFilterWhere(['like', 'rodzaj', $this->rodzaj])
            ->andFilterWhere(['like', 'nazwa', $this->nazwa])
            ->andFilterWhere(['like', 'dziedzina', $this->dziedzina])
            ->andFilterWhere(['like', 'rodzaj_certyfikatu', $this->rodzaj_certyfikatu])
            ->andFilterWhere(['like', 'nr_wersji', $this->nr_wersji])
            ->andFilterWhere(['like', 'opis', $this->opis]);

        return $dataProvider;
    }
}
