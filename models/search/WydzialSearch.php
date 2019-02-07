<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Wydzial;

/**
 * WydzialSearch represents the model behind the search form about `app\models\Wydzial`.
 */
class WydzialSearch extends Wydzial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_wydzialu'], 'integer'],
            [['nazwa_wydzialu'], 'safe'],
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
        $query = Wydzial::find();

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
            'id_wydzialu' => $this->id_wydzialu,
        ]);

        $query->andFilterWhere(['like', 'nazwa_wydzialu', $this->nazwa_wydzialu]);

        return $dataProvider;
    }
}
