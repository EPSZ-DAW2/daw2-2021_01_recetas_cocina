<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Tienda;
use app\models\Usuario;
use app\models\Tiendaoferta;
use app\models\TiendaofertaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TiendaofertaController implements the CRUD actions for Tiendaoferta model.
 */
class TiendaofertaController extends Controller
{
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
                    'only' => ['update','create','index','view','delete'],
                    'rules' => [
                        [
                            //El administrador tiene permisos sobre las siguientes acciones
                            //'actions' => ['index','create'],
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
                            //El administrador tiene permisos sobre las siguientes acciones
                            'actions' => ['update','create','index', 'view','delete'],
                            //Esta propiedad establece que tiene permisos
                            'allow' => true,
                            //Usuarios autenticados, el signo ? es para invitados
                            'roles' => ['@'],
                            //Este método nos permite crear un filtro sobre la identidad del usuario
                            //y así establecer si tiene permisos o no
                            'matchCallback' => function ($rule, $action) {
                                //Llamada al método que comprueba si es un administrador
                                //$model=Tienda::find()->where(['id' => $_GET['id']])->one();
                                var_dump(Yii::$app->user->identity->id);
                                if ( $action->id == 'index')
                                {
                                    return Usuario::esUsuarioTienda(Yii::$app->user->identity->id);
                                }
                                else
                                {
                                    return  Tienda::esPropiedadOferta(Yii::$app->user->identity->id);
    
                                }
                            },
                        ],
                        [
                        //Los usuarios simples tienen permisos sobre las siguientes acciones
                        //'actions' => ['index'],
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
     * Lists all Tiendaoferta models.
     * @return mixed
     */
    public function actionIndex()
    {


            $searchModel = new TiendaofertaSearch();
            if (isset($_GET["TiendaofertaSearch"]["q"])) {
                $dataProvider = $searchModel->searchQ($this->request->queryParams);
            }
            elseif (isset($_GET["TiendaofertaSearch"]["idq"])) {
                $dataProvider = $searchModel->search($this->request->queryParams);
            }
            else {
                $dataProvider = $searchModel->searchA($this->request->queryParams);
            }


            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

    }

    /**
     * Displays a single Tiendaoferta model.
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
     * Creates a new Tiendaoferta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tiendaoferta();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) ) {

                $idusuario=Tienda::encontrarUsuarioOferta($model->id);
                var_dump($idusuario);

                if ($idusuario == Yii::$app->user->identity->id || 
                Yii::$app->user->identity->rol == 'A' || 
                Yii::$app->user->identity->rol == 'S' ) 
                {
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                else
                {
                    return $this->redirect(['create', 'id' => $model->id,'msg'=>"fallo"]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tiendaoferta model.
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
     * Deletes an existing Tiendaoferta model.
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
     * Finds the Tiendaoferta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Tiendaoferta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tiendaoferta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
