<?php

namespace app\controllers;

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
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
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
                    $model->aceptado= $_POST['Usuario']['aceptado'];;
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
