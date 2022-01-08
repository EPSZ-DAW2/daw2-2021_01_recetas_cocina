<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Usuario;
use app\models\Receta;
use app\models\RecetaPaso;
use app\models\RecetaPasoImagen;
use app\models\RecetaPasoImagenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * RecetaPasoImagenController implements the CRUD actions for RecetaPasoImagen model.
 */
class RecetaPasoImagenController extends Controller
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
                              if ( $action->id == 'index')
                              {
                                  return Usuario::esUsuarioColaborador(Yii::$app->user->identity->id);
                              }
                              else
                              {
                                  return Receta::esPropiedadPasoImagen(Yii::$app->user->identity->id);
  
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
     * Lists all RecetaPasoImagen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecetaPasoImagenSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RecetaPasoImagen model.
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
     * Creates a new RecetaPasoImagen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RecetaPasoImagen();
        $msg="";

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) )
            {
                //$modeloPasoReceta=RecetaPaso::findOne(['id' => $model->receta_paso_id]);

                //$modeloReceta=Receta::findOne(['id' => $modeloPasoReceta->receta_id]);


                $idReceta=RecetaPaso::find()->select(['receta_id'])->where(['id'=>$model->receta_paso_id])->one();

                if (empty($idReceta)){
                    $msg="El paso no existe";
                    return $this->redirect(['create', 'id' => $model->id,'msg'=>"El paso no existe"]);
                }
                else{
                    $idusuario=Receta::find()->select(['usuario_id'])->where(['id'=>$idReceta->receta_id])->one();
                }


                //$idusuario=$modeloReceta->usuario_id;
               
                if ($idusuario->usuario_id == Yii::$app->user->identity->id || 
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
                    return $this->redirect(['create', 'id' => $model->id,'msg'=>"No puedes añadir un paso imagen de una receta no tuya"]);
                    //return $this->redirect(['create', 'id' => $model->id,'msg'=>$idReceta->receta_id]);
                
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
     * Updates an existing RecetaPasoImagen model.
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

            if ($model->imageFile && $model->validate()) {

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
            else{
                $model->save();
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
     * Deletes an existing RecetaPasoImagen model.
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

    /**
     * Finds the RecetaPasoImagen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return RecetaPasoImagen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RecetaPasoImagen::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
