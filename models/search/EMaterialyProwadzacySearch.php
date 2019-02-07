<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EMaterialyProwadzacy;

/**
 * EMaterialyProwadzacySearch represents the model behind the search form about `app\models\EMaterialyProwadzacy`.
 */
class EMaterialyProwadzacySearch extends EMaterialyProwadzacy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mater_prowadz', 'id_e_materialu', 'id_prowadzacego'], 'integer'],
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
        $query = EMaterialyProwadzacy::find();

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
            'id_mater_prowadz' => $this->id_mater_prowadz,
            'id_e_materialu' => $this->id_e_materialu,
            'id_prowadzacego' => $this->id_prowadzacego,
        ]);

        return $dataProvider;
    }
}
