<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use app\models\Usuario;
use app\models\RecetaComentarios;
use app\models\Receta;
use app\models\RecetaComentariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RecetaComentariosController implements the CRUD actions for RecetaComentarios model.
 */
class RecetaComentariosController extends Controller
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
                                    return Receta::esPropiedadComentario(Yii::$app->user->identity->id);

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
     * Lists all RecetaComentarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecetaComentariosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RecetaComentarios model.
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
     * Creates a new RecetaComentarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RecetaComentarios();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                if ($model->usuario_id==Yii::$app->user->identity->id || 
                Yii::$app->user->identity->rol == 'A' || 
                Yii::$app->user->identity->rol == 'S' ) 
                {
                    $model->fechahora= date("Y-m-d H:i:s");
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id, 'msg'=>"Comentario añadido correctamente."]);
                }
                else
                {
                    return $this->redirect(['create', 'id' => $model->id,'msg'=>'Solo puedes crear comentarios de tu usuario.']);
                }
        
            }
        } else {//No vengo del post sino con valores por defecto
            $model->loadDefaultValues();
            $model->fechahora= date("Y-m-d H:i:s");
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RecetaComentarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id, "msg"=>"hola"]);
        }



        //$idr=RecetaComentarios::find()->where(['id'=>$_GET['id']])->one();

        return $this->render('update', [
            'model' => $model,
            'msg'=>"prueba"
        ]);
    }

    /**
     * Deletes an existing RecetaComentarios model.
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
     * Finds the RecetaComentarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return RecetaComentarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RecetaComentarios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
