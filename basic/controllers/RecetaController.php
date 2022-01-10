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

//Para borrar
use app\models\RecetaPaso;
use app\models\RecetaPasoImagen;
use app\models\RecetaComentarios;
use app\models\RecetaIngrediente;
use app\models\MenuReceta;
use app\models\RecetaCategorias;

/**
 * RecetaController implements the CRUD actions for Receta model.
 */
class RecetaController extends Controller
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
                           'actions' => ['create', 'update','delete', 'view','index'],
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
                                  return  Receta::esPropiedad(Yii::$app->user->identity->id);
  
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
     * Lists all Receta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecetaSearch();
        if ( Usuario::esUsuarioAdministrador(Yii::$app->user->identity->id) ||
            Usuario::esUsuarioSistema(Yii::$app->user->identity->id)){
            if (isset($_GET["RecetaSearch"]["q"])) {
                $dataProvider = $searchModel->searchQ($this->request->queryParams);
            }
            else
            {
                $dataProvider = $searchModel->search($this->request->queryParams);
            }
        }
        else{
            if (isset($_GET["RecetaSearch"]["q"])) {
                $dataProvider = $searchModel->searchQMia($this->request->queryParams);
            }
            else
            {
                $dataProvider = $searchModel->searchMias($this->request->queryParams);
            }

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
                if (Usuario::esUsuarioColaborador(Yii::$app->user->identity->id)){
                    $model->usuario_id = Yii::$app->user->identity->id;
                }

                if ($model->usuario_id==Yii::$app->user->identity->id || 
                Yii::$app->user->identity->rol == 'A' || 
                Yii::$app->user->identity->rol == 'S' ) 
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
                }
                else
                {
                    return $this->redirect(['create', 'id' => $model->id,'msg'=>'Solo puedes crear recetas de tu tipo.']);
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
        //Localiza los pasos de la receta
       
        if (($paso = RecetaPaso::find()->where(['receta_id' => $id])->all()) !== null)
        //para cada paso
        foreach($paso as $c)
        {
            //Localiza las imagenes de los pasos de la receta
            if (($img = RecetaPasoImagen::find()->where(['receta_paso_id' => $c->id])->all()) !== null)
            //para cada foto
            foreach($img as $d)
            {
                //borra la foto del paso de la bbdd
                $d->delete($d->id);
                //borra la foto del paso del servidor
                $rutaimg="uploads/".$d->imagen;
                if (!empty($d->imagen) && file_exists($rutaimg)) unlink($rutaimg);
            }
            $c->delete($c->id);
        }

        //Borra las imagenes de los pasos de la receta
        //Borra los pasos de la receta

        // Borra comentarios
        if (($comentario = RecetaComentarios::find()->where(['receta_id' => $id])->all()) !== null)
        foreach($comentario as $c)
        {
            $c->delete($c->id);
        }

        // Borra receta-categoria
        if (($categoria = RecetaCategorias::find()->where(['receta_id' => $id])->all()) !== null)
        foreach($categoria as $c)
        {
            $c->delete($c->id);
        }

        // Borra menu-platos
        if (($menu = RecetaComentarios::find()->where(['receta_id' => $id])->all()) !== null)
        foreach($menu as $c)
        {
            $c->delete($c->id);
        }

        // Borra receta-ingredientes
        if (($ingredientes = RecetaIngrediente::find()->where(['receta_id' => $id])->all()) !== null)
        foreach($ingredientes as $c)
        {
            $c->delete($c->id);
        }
       
        //borra la imagen de la receta
        $model = $this->findModel($id);

        $rutaimg="uploads/".$model->imagen;
        if (!empty($model->imagen) && file_exists($rutaimg)) unlink($rutaimg);

        // Borra la receta
        $this->findModel($id)->delete();
        return $this->redirect(['index', 'msg'=>'Receta eliminada correctamente!.']);
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
