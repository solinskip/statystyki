<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RealizacjaProwadzacy;

/**
 * RealizacjaProwadzacySearch represents the model behind the search form about `app\models\RealizacjaProwadzacy`.
 */
class RealizacjaProwadzacySearch extends RealizacjaProwadzacy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_real_prow', 'id_realizacji', 'id_prowadzacego'], 'integer'],
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
        $query = RealizacjaProwadzacy::find();

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
            'id_real_prow' => $this->id_real_prow,
            'id_realizacji' => $this->id_realizacji,
            'id_prowadzacego' => $this->id_prowadzacego,
        ]);

        return $dataProvider;
    }
}
