<?php

namespace app\controllers;


use Yii;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Categorias;
use app\models\CategoriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\dumBD;

/**
 * CategoriasController implements the CRUD actions for Categorias model.
 */
class CopiaController extends Controller
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
        $dumper = new dumpDB();
        $dataProvider=$dumper->listarArchivos('../backups/sql/');

        $gridViewDataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $dataProvider,
            'sort' => [
                'attributes' => ['nombre'],

            ],
            'pagination' => ['pageSize' => 10]
        ]);



        return $this->render('index', [
            'dataProvider' => $gridViewDataProvider,
            "msg"=>""
        ]);
    }

    public function actionDescargar()
    {
        $dumper = new dumpDB();
        echo $dumper->getDump();

        $dataProvider=$dumper->listarArchivos('../backups/sql/');

        $gridViewDataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $dataProvider,
            'sort' => [
                'attributes' => ['nombre'],

            ],
            'pagination' => ['pageSize' => 10]
        ]);



        return $this->render('index', [
            'dataProvider' => $gridViewDataProvider,
            "msg"=>""
        ]);
    }



    /**
     * Creates a new Categorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCopia()
    {

        $dumper = new dumpDB();

        // comprobar que la ruta existe y sino crearla

        $bk_file = '../backups/sql/backup'.'_'.date('Y').'-'.date('m').'-'.date('d').'_'.date('G').'-'.date('i').'-'.date('s').'.sql';
        $fh = fopen($bk_file, 'w') or die("can't open file");
        fwrite($fh, $dumper->getDump(FALSE));
        fclose($fh);

        $dataProvider=$dumper->listarArchivos('../backups/sql/');

        $gridViewDataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $dataProvider,
            'sort' => [
                'attributes' => ['nombre'],

            ],
            'pagination' => ['pageSize' => 10]
        ]);



        return $this->render('index', [
            'dataProvider' => $gridViewDataProvider,
            "msg"=>"Copia Realizada Correctamente"
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
