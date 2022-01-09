<?php

namespace app\controllers;
use yii\helpers\ArrayHelper;
use app\models\Categorias;
use app\models\CategoriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * CategoriasController implements the CRUD actions for Categorias model.
 */
class CategoriasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Categorias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoriasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    //para ver las categorias que hay ???
    
    //para ver una categoria en concreto?
   /* public function actionVercategoria()
    {
        $titulo="Categorias";
        $searchModel = new CategoriasSearch();

        if (isset($_GET["id"]))
        {
            $dataProvider = $searchModel->searchID($this->request->queryParams);
            $dataProvider2 = $searchModel->searchCategoria($this->request->queryParams);
            //$dataProvider3 = $searchModel->searchRecetaComentarios($this->request->queryParams);
            //$modeloOfertas=Tiendaoferta::find()->orderBy([
             //   'id' => SORT_DESC,
            //])->limit(9)->all();

            return $this->render('categoriadetalle', [
                'titulo' => $titulo,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'dataProvider2' => $dataProvider2,
            ]);
        }
        else
        {
            $dataProvider = $searchModel->search($this->request->queryParams);
            return $this->render('categoriadetalle', [
                'titulo' => $titulo,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
        }
    }
*/




    /**
     * Displays a single Categorias model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Categorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categorias();
        
        //use yii\helpers\ArrayHelper;
        $listacategoria=ArrayHelper::map(Categorias::find()->all(),'id','nombre');
        $listacategoria[0]="Ninguna";
      
        
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }
        $model->categoria_padre_id=0;
       
        return $this->render('create', [
            'model' => $model,
            'listacategoria'=> $listacategoria,
            'seleccion'=>0
        ]);
    }

    /**
     * Updates an existing Categorias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Categorias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Categorias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Categorias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categorias::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
