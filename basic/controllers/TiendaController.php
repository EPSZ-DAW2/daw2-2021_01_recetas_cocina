<?php

namespace app\controllers;

use app\models\Tiendaoferta;
use Yii;
use yii\filters\AccessControl;
use app\models\Usuario;

use app\models\Tienda;
use app\models\TiendaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TiendaController implements the CRUD actions for Tienda model.
 */
class TiendaController extends Controller
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
                                
                                if ( $action->id == 'index')
                                {
                                    return Usuario::esUsuarioTienda(Yii::$app->user->identity->id);
                                }
                                else
                                {
                                    return  Tienda::esPropiedad(Yii::$app->user->identity->id);
    
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
     * Lists all Tienda models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TiendaSearch();
        if ( Usuario::esUsuarioAdministrador(Yii::$app->user->identity->id) ||
            Usuario::esUsuarioSistema(Yii::$app->user->identity->id)) {
            if (isset($_GET["TiendaSearch"]["q"])) {
                $dataProvider = $searchModel->searchQ($this->request->queryParams);
            } else {
                $dataProvider = $searchModel->search($this->request->queryParams);
            }
        }
        else{
            if (isset($_GET["TiendaSearch"]["q"])) {
                $dataProvider = $searchModel->searchQMia($this->request->queryParams);
            } else {
                $dataProvider = $searchModel->searchMia($this->request->queryParams);
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tienda model.
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
     * Creates a new Tienda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tienda();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if ($model->usuario_id==Yii::$app->user->identity->id || 
                Yii::$app->user->identity->rol == 'A' || 
                Yii::$app->user->identity->rol == 'S' ) 
                {
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id, 'msg'=>'Tienda creada correctamente.']);
                }
                else
                {
                    return $this->redirect(['create', 'id' => $model->id,'msg'=>'Solo puedes crear tiendas de tu tipo.']);
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
     * Updates an existing Tienda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'msg'=>'Tienda actualizada correctamente.']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tienda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $oferta = Tiendaoferta::find()->where(['tienda_id' => $id])->all();

        //para cada oferta
        foreach($oferta as $of)
        {
            $of->delete();
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index', 'msg'=>'Tienda eliminada correctamente.']);
    }

    /**
     * Finds the Tienda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Tienda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tienda::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
