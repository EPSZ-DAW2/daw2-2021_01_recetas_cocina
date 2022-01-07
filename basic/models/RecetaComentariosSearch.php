<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RecetaComentarios;

/**
 * RecetaComentariosSearch represents the model behind the search form of `app\models\RecetaComentarios`.
 */
class RecetaComentariosSearch extends RecetaComentarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'receta_id', 'usuario_id'], 'integer'],
            [['fechahora', 'texto'], 'safe'],
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
        $query = RecetaComentarios::find();

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
            'receta_id' => $this->receta_id,
            'usuario_id' => $this->usuario_id,
            'fechahora' => $this->fechahora,
        ]);

        $query->andFilterWhere(['like', 'texto', $this->texto]);

        return $dataProvider;
    }
}
