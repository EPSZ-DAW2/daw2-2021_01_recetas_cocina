<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tiendaoferta;

/**
 * TiendaofertaSearch represents the model behind the search form of `app\models\Tiendaoferta`.
 */
class TiendaofertaSearch extends Tiendaoferta
{
    public $q;
    public $idq;
    public $tipo;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tienda_id', 'ingrediente_id'], 'integer'],
            [['descripcion','q','tipo', 'envase', 'medida', 'notas'], 'safe'],
            [['cantidad'], 'number'],
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

        $query = Tiendaoferta::find();

        if (isset($_GET["TiendaofertaSearch"]["idq"])) $this->idq= $_GET["TiendaofertaSearch"]["idq"];

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
            'tienda_id' => $this->idq,
        ]);

        return $dataProvider;
    }


    /**
     * Creates data provider instance with search for Type of Ingredients
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchTipo($params)
    {

        $query = Tiendaoferta::find();

        if (isset($_GET["TiendaofertaSearch"]["idq"])) $this->idq= $_GET["TiendaofertaSearch"]["idq"];

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
            'tienda_id' => $this->idq,
        ]);

        $query->orFilterWhere(['like', 'descripcion', $this->tipo])->orFilterWhere(['like', 'envase', $this->tipo]);

        return $dataProvider;
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */


    public function searchA($params)
    {

        $query = Tiendaoferta::find();



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
             'tienda_id' => $this->tienda_id,
             'ingrediente_id' => $this->ingrediente_id,
             'cantidad' => $this->cantidad,
         ]);

         $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
             ->andFilterWhere(['like', 'envase', $this->envase])
             ->andFilterWhere(['like', 'medida', $this->medida])
             ->andFilterWhere(['like', 'notas', $this->notas]);

         

        return $dataProvider;
    }

    public function searchQ($params)
    {
        $query = Tiendaoferta::find();

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
            'tienda_id' => $this->idq,
        ]);

        $query->orFilterWhere(['like', 'id', $this->q])
            ->orFilterWhere(['like', 'descripcion', $this->q])
            ->orFilterWhere(['like', 'tienda_id', $this->q])
            ->orFilterWhere(['like', 'ingrediente_id', $this->q])
            ->orFilterWhere(['like', 'cantidad', $this->q])
            ->orFilterWhere(['like', 'envase', $this->q])
            ->orFilterWhere(['like', 'medida', $this->q])
            ->orFilterWhere(['like', 'notas', $this->q]);

        return $dataProvider;
    }

    public function searchID($params)
    {
        $query = Tiendaoferta::find();

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
