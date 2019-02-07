<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Platforma;

/**
 * PlatformaSearch represents the model behind the search form about `app\models\Platforma`.
 */
class PlatformaSearch extends Platforma
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_platformy'], 'integer'],
            [['nazwa_platformy'], 'safe'],
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
        $query = Platforma::find();

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
            'id_platformy' => $this->id_platformy,
        ]);

        $query->andFilterWhere(['like', 'nazwa_platformy', $this->nazwa_platformy]);

        return $dataProvider;
    }
}
