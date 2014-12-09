<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Demand;

/**
 * DemandSearch represents the model behind the search form about `app\models\Demand`.
 */
class DemandSearch extends Demand
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'aid_id', 'amount'], 'integer'],
            [['date'], 'safe'],
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
        $query = Demand::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'aid_id' => $this->aid_id,
            'amount' => $this->amount,
        ]);

        return $dataProvider;
    }
}
