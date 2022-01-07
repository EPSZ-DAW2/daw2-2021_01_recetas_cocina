<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use app\models\Usuario;
use app\models\Receta;
use app\models\RecetaSearch;
use app\models\UsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;



/**
 * RecetaController implements the CRUD actions for Receta model.
 */
class RecetaController extends Controller
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
                              return Usuario::esUsuarioColaborador(Yii::$app->user->identity->id);
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
     * Lists all Receta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecetaSearch();
        if (isset($_GET["RecetaSearch"]["q"])) {
            $dataProvider = $searchModel->searchQ($this->request->queryParams);
        }
        else
        {
            $dataProvider = $searchModel->search($this->request->queryParams);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Receta model.
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
     * Creates a new Receta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Receta();
        $msg="";

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) )
            {
                    $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

                    if ($model->imageFile && $model->validate())
                    {

                            $nameAux=$model->imageFile->baseName.time().'.'.$model->imageFile->extension;
                            $model->imagen=$nameAux;
                            $msg = "<strong class='label label-info'>Enhorabuena, creacion realizada con éxito</strong>";
                            $msg.=" --> ".$nameAux;
                            $model->save();
                            $model->imageFile->saveAs('uploads/' .$nameAux);
                    }
                    else
                    {
                        $model->save();
                        $msg = "<strong class='label label-info'>Enhorabuena, creacion realizada con éxito</strong>";
                    }

                //return $this->redirect(['view', ['id' => $model->id, 'msg' => $msg]]);
                return $this->render('view', [
                    'model' => $model,
                    'msg'=>$msg
                ]);
            }

        }
        else
        {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'msg'=>$msg
        ]);
    }

    /**
     * Updates an existing Receta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()))
        {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->imageFile && $model->validate())
            {
                $rutaimg="uploads/".$model->imagen;
                if (!empty($model->imagen) && file_exists($rutaimg)) unlink($rutaimg);

                $nameAux=$model->imageFile->baseName.time().'.'.$model->imageFile->extension;
                $model->imagen=$nameAux;
                $msg = "<strong class='label label-info'>Enhorabuena, actualización realizada con éxito</strong>";
                $msg.=" --> ".$nameAux;

                $model->save();

                $model->imageFile->saveAs('uploads/' .$nameAux);

                //return $this->redirect(['view', ['id' => $model->id, 'msg' => $msg]]);

            }
            else
            {
                if($model->save())
                $msg = "<strong class='label label-info'>Enhorabuena, actualización realizada con éxito</strong>";
            }

            return $this->render('view', [
                'model' => $model,
                'msg'=>$msg
            ]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Receta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $rutaimg="uploads/".$model->imagen;
        if (!empty($model->imagen) && file_exists($rutaimg)) unlink($rutaimg);

        $model->delete();

        return $this->redirect(['index']);
    }

    public function actionRecetasaceptar()
    {
        $searchModel = new RecetaSearch(['aceptada'=>0]);
        //$dataProvider = Usuario::find();
        $dataProvider = $searchModel->searchNoaceptadas($this->request->queryParams);
        //$query = Usuario::find()->where(['id' => 1])->one();

        // add conditions that should always apply here

        /*             $dataProvider = new ActiveDataProvider([
                        'query' => $query,

                    ]); */

        return $this->render('recetasaceptar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAceptar($id)
    {
        $model = $this->findModel($id);

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
     * Finds the Receta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Receta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Receta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
