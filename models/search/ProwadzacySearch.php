<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prowadzacy;

/**
 * ProwadzacySearch represents the model behind the search form about `app\models\Prowadzacy`.
 */
class ProwadzacySearch extends Prowadzacy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_prowadzacego'], 'integer'],
            [['imie_prowadzacego', 'nazwisko_prowadzacego', 'jednostka_organizacyjna', 'stanowisko', 'adres_email', 'adres_www'], 'safe'],
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
        $query = Prowadzacy::find();

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
            'id_prowadzacego' => $this->id_prowadzacego,
        ]);

        $query->andFilterWhere(['like', 'imie_prowadzacego', $this->imie_prowadzacego])
            ->andFilterWhere(['like', 'nazwisko_prowadzacego', $this->nazwisko_prowadzacego])
            ->andFilterWhere(['like', 'jednostka_organizacyjna', $this->jednostka_organizacyjna])
            ->andFilterWhere(['like', 'stanowisko', $this->stanowisko])
            ->andFilterWhere(['like', 'adres_email', $this->adres_email])
            ->andFilterWhere(['like', 'adres_www', $this->adres_www]);

        return $dataProvider;
    }
}
