<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use app\models\Usuario;
use app\models\UsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
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
                    //'only' => ['index'],
                    'rules' => [
                        [
                            //El administrador tiene permisos sobre las siguientes acciones
                            //'actions' => ['index','create'],
                            //Esta propiedad establece que tiene permisos
                            'allow' => True,
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
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioSearch();
        if (isset($_GET["UsuarioSearch"]["q"])) {
            $dataProvider = $searchModel->searchQ($this->request->queryParams);
        }
        else {
            $dataProvider = $searchModel->search($this->request->queryParams);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUsuariosaceptar()
    {
        $searchModel = new UsuarioSearch(['aceptado'=>0]);
        //$dataProvider = Usuario::find();
            $dataProvider = $searchModel->search($this->request->queryParams);
            //$query = Usuario::find()->where(['id' => 1])->one();

            // add conditions that should always apply here
    
/*             $dataProvider = new ActiveDataProvider([
                'query' => $query,
    
            ]); */

        return $this->render('usuariosaceptar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
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
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuario();

        if ($this->request->isPost) {
/*             if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } */
            if ($model->load($this->request->post())) {
                if ($model->validate()) {
                    // form inputs are valid, do something here
        
                    
                    $model->email= $_POST['Usuario']['email'];
                    $model->password= hash("sha1", $_POST['Usuario']['password']);
                    $model->nombre= $_POST['Usuario']['nombre'];
                    $model->rol= $_POST['Usuario']['rol'];;
                    $model->aceptado= 0;
                    $model->creado= date("Y-m-d H:i:s");
                    
                    if($model->save()){
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
        
        
                    return;
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
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pass = $model->password;
/*         if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } */
        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->validate()) {
                // si cambia la contraseña le pasamos el hash
                if (strcmp($pass, $_POST['Usuario']['password']) !== 0) {
                    
                    $model->password= hash("sha1", $_POST['Usuario']['password']);
                }

                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
    
    
                return;
            }
        }        

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionAceptar($id)
    {
        $model = $this->findModel($id);
        $pass = $model->password;
/*         if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } */
        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->validate()) {


                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
    
    
                return;
            }
        }        

        return $this->render('aceptar', [
            'model' => $model,
        ]);
    }
    /**
     * Deletes an existing Usuario model.
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
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
