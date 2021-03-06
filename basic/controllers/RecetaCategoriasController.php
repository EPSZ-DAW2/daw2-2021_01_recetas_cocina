<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use app\models\Usuario;
use app\models\Receta;
use app\models\RecetaCategorias;
use app\models\Categorias;
use app\models\RecetaCategoriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\RecetaSearch;

/**
 * RecetaCategoriasController implements the CRUD actions for RecetaCategorias model.
 */
class RecetaCategoriasController extends Controller
{
    public function beforeAction($action)
    {
        if (isset(Yii::$app->user->identity->id))
        {
            if (Usuario::esUsuarioColaborador(Yii::$app->user->identity->id) ||
                Usuario::esUsuarioAdministrador(Yii::$app->user->identity->id) ||
                Usuario::esUsuarioSistema(Yii::$app->user->identity->id) ||
                Usuario::esUsuarioTienda(Yii::$app->user->identity->id) )
                $this->layout = 'private';
            else if (Yii::$app->user->isGuest)
                $this->layout = 'public';
        }
        else {$this->layout = 'public';}

        return parent::beforeAction($action);
    }

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    //'only' => ['logout'],
                    'rules' => [
                        [
                            //El administrador tiene permisos sobre las siguientes acciones
                            //'actions' => ['logout'],
                            //Esta propiedad establece que tiene permisos
                            'allow' => true,
                            //Usuarios autenticados, el signo ? es para invitados
                            'roles' => ['@'],
                            //Este método nos permite crear un filtro sobre la identidad del usuario
                            //y así establecer si tiene permisos o no
                            'matchCallback' => function ($rule, $action) {
                                //Llamada al método que comprueba si es un administrador
                                return Usuario::esUsuarioAdministrador(Yii::$app->user->identity->id);
                            },
                        ],
                        [
                           //Los usuarios simples tienen permisos sobre las siguientes acciones
                           //'actions' => ['logout'],
                           //Esta propiedad establece que tiene permisos
                           'allow' => true,
                           //Usuarios autenticados, el signo ? es para invitados
                           'roles' => ['@'],
                           //Este método nos permite crear un filtro sobre la identidad del usuario
                           //y así establecer si tiene permisos o no
                           'matchCallback' => function ($rule, $action) {
                              //Llamada al método que comprueba si es un usuario simple
                              if ( $action->id == 'index')
                                {
                                    return Usuario::esUsuarioColaborador(Yii::$app->user->identity->id);
                                }
                                else
                                {
                                    return  Receta::esPropiedadCategoria(Yii::$app->user->identity->id);

                                }
                          },
                       ],
                        [
                        //Los usuarios simples tienen permisos sobre las siguientes acciones
                        //'actions' => ['logout'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un usuario simple
                            return Usuario::esUsuarioSistema(Yii::$app->user->identity->id);
                        },
                        ],
    
                    ],
                ],
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
     * Lists all RecetaCategorias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecetaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RecetaCategorias model.
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
     * Creates a new RecetaCategorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($categoria_id,$receta_id)
    {
        $model = new RecetaCategorias();

        /*if ($this->request->isPost) {
            if ($model->load($this->request->post()) ) {
                $modeloReceta=Receta::findOne(['id' => $model->receta_id]);

                $idusuario=$modeloReceta->usuario_id;
               
                if ($idusuario == Yii::$app->user->identity->id || 
                Yii::$app->user->identity->rol == 'A' || 
                Yii::$app->user->identity->rol == 'S' ) 
                {
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id,'msg'=>"Categoria añadida correctamente a receta"]);
                }
                else
                {
                    return $this->redirect(['create', 'id' => $model->id,'msg'=>"No puedes añadir la categoria a esta receta"]);
                }
                return $this->redirect(['view', 'id' => $model->id]);
               
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);*/
        $model->categoria_id=$categoria_id;
        $model->receta_id=$receta_id;
        $model->save();
        return $this->redirect(['update','id'=>$receta_id]);
    }

    /**
     * Updates an existing RecetaCategorias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        
        $model = Receta::findOne($id);
        $idusuario=$model->usuario_id;
        if ($idusuario == Yii::$app->user->identity->id || 
        Yii::$app->user->identity->rol == 'A' || 
        Yii::$app->user->identity->rol == 'S' ) 
        {

        //Buscamos todas las categorias
        $allcategorias=Categorias::find()->all();
        //Buscamos las relaciones que tiene receta con categorias
        $filterall=RecetaCategorias::findAll(['receta_id'=>$id]); 
        $idfilterall=ArrayHelper::map($filterall,'categoria_id','categoria_id');
        
        $categoriaReceta=array();
        $arrayCategorias=array();
        foreach($allcategorias as $categoria){
            if(isset($idfilterall[$categoria->id])){
                $categoriaReceta[]=$categoria;
            }else{
                $arrayCategorias[]=$categoria; 
            }
        }
        /*
        //var_dump($categoriaReceta);
       // return;
        /*if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        */
        return $this->render('update', [
            'model' => $model,
            'categoriaReceta'=>$categoriaReceta,
            'arrayCategorias'=>$arrayCategorias,
        ]);
        }//if
        /*else
        {
            return $this->redirect(['index','msg'=>"No puedes añadir la categoria a esta receta"]);
        }*/   
    }

    /**
     * Deletes an existing RecetaCategorias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($categoria_id,$receta_id)
    {
       // $this->findModel($id)->delete();
       RecetaCategorias::findOne(['categoria_id'=>$categoria_id,'receta_id'=>$receta_id])->delete();

        //return $this->redirect(['index']);
        return $this->redirect(['update','id'=>$receta_id]);
    }

    /**
     * Finds the RecetaCategorias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return RecetaCategorias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RecetaCategorias::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
