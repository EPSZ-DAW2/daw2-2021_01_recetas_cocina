<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tienda;
use yii\widgets\LinkPager;

/**
 * TiendaSearch represents the model behind the search form of `app\models\Tienda`.
 */
class TiendaSearch extends Tienda
{
    public $q;
    public $pob;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'usuario_id', 'activa', 'visible'], 'integer'],
            [['nombre','q','pob','domicilio', 'poblacion', 'provincia'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Tienda::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=> [
                'pageSize'=>6
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'usuario_id' => $this->usuario_id,
            'activa' => $this->activa,
            'visible' => $this->visible,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'domicilio', $this->domicilio])
            ->andFilterWhere(['like', 'poblacion', $this->poblacion])
            ->andFilterWhere(['like', 'provincia', $this->provincia]);

        return $dataProvider;
    }
    public function searchMia($params)
    {
        $query = Tienda::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=> [
                'pageSize'=>6
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'usuario_id' => Yii::$app->user->identity->id,
            'activa' => $this->activa,
            'visible' => $this->visible,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'domicilio', $this->domicilio])
            ->andFilterWhere(['like', 'poblacion', $this->poblacion])
            ->andFilterWhere(['like', 'provincia', $this->provincia]);

        return $dataProvider;
    }


    /**
     * Creates data provider instance with poblation filter
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchPob($params)
    {
        $query = Tienda::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=> [
                'pageSize'=>6
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'poblacion', $this->pob]);

        return $dataProvider;
    }

    public function searchQ($params)
    {
        $query = Tienda::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=> [
                'pageSize'=>6
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orFilterWhere(['like', 'id', $this->q])
            ->orFilterWhere(['like', 'usuario_id', $this->q])
            ->orFilterWhere(['like', 'activa', $this->q])
            ->orFilterWhere(['like', 'visible', $this->q])
            ->orFilterWhere(['like', 'nombre', $this->q])
            ->orFilterWhere(['like', 'domicilio', $this->q])
            ->orFilterWhere(['like', 'poblacion', $this->q])
            ->orFilterWhere(['like', 'provincia', $this->q]);

        return $dataProvider;
    }
    public function searchQMia($params)
    {
        $query = Tienda::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=> [
                'pageSize'=>6
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orFilterWhere(['like', 'id', $this->q])
            ->andFilterWhere(['like', 'usuario_id', Yii::$app->user->identity->id])
            ->orFilterWhere(['like', 'activa', $this->q])
            ->orFilterWhere(['like', 'visible', $this->q])
            ->orFilterWhere(['like', 'nombre', $this->q])
            ->orFilterWhere(['like', 'domicilio', $this->q])
            ->orFilterWhere(['like', 'poblacion', $this->q])
            ->orFilterWhere(['like', 'provincia', $this->q]);

        return $dataProvider;
    }

    public function searchID($params)
    {
        $query = Tienda::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,

        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        return $dataProvider;
    }
}
