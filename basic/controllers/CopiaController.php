<?php

namespace app\controllers;

use app\models\UploadForm;
use Yii;
use yii\filters\AccessControl;
use app\models\Usuario;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Categorias;
use app\models\CategoriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\widgets\dumBD;

use ZipArchiver;

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
                'access' => [
                    'class' => AccessControl::className(),
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

    public function actionIndexfiles()
    {
        $dumper = new dumpDB();
        $dataProvider=$dumper->listarArchivos2('../backups/imagenes/');

        $gridViewDataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $dataProvider,
            'sort' => [
                'attributes' => ['nombre'],
            ],
            'pagination' => ['pageSize' => 10]
        ]);



        return $this->render('indexficheros', [
            'dataProvider' => $gridViewDataProvider,
            "msg"=>""
        ]);
    }


    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {
                $model->file->saveAs('../backups/sql/' . $model->file->baseName . '.' . $model->file->extension);
                $msg="Archivo sql subido correctamente --> ".$model->file->baseName.".".$model->file->extension;

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
                    "msg"=>$msg,
                    'model' => $model
                ]);
            }
        }
        else{
            return $this->render('upload', ['model' => $model]);
        }


    }
/*

    }*/

    public function actionDescargaractual()
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

    public function actionDescargarsql()
    {

        $fichero = $_GET['f']; //procesar
        $rutaFichero = '../backups/sql/' . $fichero;

        if (file_exists($rutaFichero)) {

            $sql = file_get_contents($rutaFichero);
            header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            header("Cache-Control: no-cache");
            header("Pragma: no-cache");
            header("Content-type:application/sql");
            header("Content-Disposition:attachment;filename=".$fichero);
            return $sql;
        }

    }

    public function actionDescargarfichero()
    {

        $fichero = $_GET['f']; //procesar
        $rutaFichero = '../backups/imagenes/'.$fichero;

        if (file_exists($rutaFichero)) {

            require_once 'ZipArchiver.php';
            $zipper = new ZipArchiver();

            // Path of the directory to be zipped
            $dirPath = $rutaFichero;

            // Path of output zip file
            $filename=$fichero.'_'.time().'.zip';
            $zipPath = '../backups/temp/'.$filename;

            if (!file_exists('../backups/temp/')){
                mkdir('../backups/temp/');
            }

            // Create zip archive
            $zip = $zipper->zipDir($dirPath, $zipPath);

            header('Content-Type: application/octet-stream');
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=$filename");

            // Leer el contenido binario del zip y enviarlo

            $contenido=file_get_contents($zipPath);

            // eliminamos el residuo
            unlink($zipPath);

            return $contenido;


        }

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

        $carpeta1='../backups';
        $carpeta2='../backups/sql';

        if (!file_exists($carpeta1)){
            mkdir($carpeta1);
        }
        if (!file_exists($carpeta2)){
            mkdir($carpeta2);
        }

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
     * Creates a new Categorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCopiaficheros()
    {

        // comprobar que la ruta existe y sino crearla
        $dumper = new dumpDB();

        $carpeta1='../backups';
        $carpeta2='../backups/imagenes';

        if (!file_exists($carpeta1)){
            mkdir($carpeta1);
        }
        if (!file_exists($carpeta2)){
            mkdir($carpeta2);
        }

        $imagenes1="images/";
        $imagenes2="uploads/";

        $bk_folder = '../backups/imagenes/backup'.'_'.date('Y').'-'.date('m').'-'.date('d').'_'.date('G').'-'.date('i').'-'.date('s');

        if (!file_exists($bk_folder))
        {
            mkdir($bk_folder);
        }

        if(!is_dir($bk_folder.'/'.$imagenes1)){

            if (!file_exists($bk_folder.'/'.$imagenes1)){
                mkdir($bk_folder.'/'.$imagenes1);
            }

            $source =$imagenes1;
            $destination = $bk_folder.'/'.$imagenes1;
            $dumper->copiaFicheros($source, $destination);
        }
        if(!is_dir($bk_folder.'/'.$imagenes2)){

            if (!file_exists($bk_folder.'/'.$imagenes2)){
                mkdir($bk_folder.'/'.$imagenes2);
            }

            $source =$imagenes2;
            $destination = $bk_folder.'/'.$imagenes2;
            $dumper->copiaFicheros($source, $destination);
        }


        $dataProvider=$dumper->listarArchivos2('../backups/imagenes/');

        $gridViewDataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $dataProvider,
            'sort' => [
                'attributes' => ['nombre'],

            ],
            'pagination' => ['pageSize' => 10]
        ]);


        return $this->render('indexficheros', [
            'dataProvider' => $gridViewDataProvider,
            "msg"=>"Copia ficheros Realizada Correctamente"
        ]);

    }

    /**
     * Creates a new Categorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionRestaurarcopia()
    {
        $raiz = '../backups/sql';

        $dumper = new dumpDB();

        $arrayFicheros = $dumper->listarArchivos('../backups/sql/');

        $gridViewDataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $arrayFicheros,
            'sort' => [
                'attributes' => ['nombre'],

            ],
            'pagination' => ['pageSize' => 10]
        ]);

        //$fichero="backup_2022-01-08_21-57-07.sql";
        if (isset($_GET['f'])) {
            $fichero = $_GET['f']; //procesar
            $rutaFichero = '../backups/sql/' . $fichero;



            if (file_exists($rutaFichero)) {
                $sql = file_get_contents($rutaFichero);
                Yii::$app->db->pdo->exec($sql);

                return $this->render('index', [
                    'dataProvider' => $gridViewDataProvider,
                    "msg" => "Copia de seguridad restaurada --> " . $fichero,
                ]);
            } else {
                return $this->render('index', [
                    'dataProvider' => $gridViewDataProvider,
                    "msgError" => "El fichero especificado no existe."
                ]);
            }
        } else {
            return $this->render('index', [
                'dataProvider' => $gridViewDataProvider,
                "msgError" => "Fichero no especificado"
            ]);
        }
    }

    /**
     * Creates a new Categorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionRestaurarcopiaficheros()
    {
        $raiz = '../backups/imagenes/';
        $destino1="images/";
        $destino2="uploads/";

        $dumper = new dumpDB();

        $arrayFicheros = $dumper->listarArchivos2($raiz);

        $gridViewDataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $arrayFicheros,
            'sort' => [
                'attributes' => ['nombre'],

            ],
            'pagination' => ['pageSize' => 10]
        ]);

        //$fichero="backup_2022-01-08_21-57-07.sql";
        if (isset($_GET['f'])) {
            $fichero = $_GET['f']; //procesar
            $rutaCopia = $raiz.$fichero;

            if (file_exists($rutaCopia))
            {
               //eliminamos el contenido de los destinos
                if (file_exists($destino1)) {$dumper->borrarDirectorio($destino1);}
                if (file_exists($destino2)) {$dumper->borrarDirectorio($destino2);}

                //copiamos el nuevo contenido, creamos las carpetas vacias si no existen
                if (!file_exists($destino1)){mkdir($destino1);}
                $source =$rutaCopia.'/'.$destino1;
                $destination = $destino1;
                $dumper->copiaFicheros($source, $destination);

                if (!file_exists($destino2)){mkdir($destino2);}
                $source =$rutaCopia.'/'.$destino2;
                $destination = $destino2;
                $dumper->copiaFicheros($source, $destination);


                return $this->render('indexficheros', [
                    'dataProvider' => $gridViewDataProvider,
                    "msg" => "Copia de seguridad restaurada --> " . $fichero,
                ]);
            }
            else
            {
                return $this->render('indexficheros', [
                    'dataProvider' => $gridViewDataProvider,
                    "msgError" => "El fichero especificado no existe."
                ]);
            }
        } else {
            return $this->render('indexficheros', [
                'dataProvider' => $gridViewDataProvider,
                "msgError" => "Fichero no especificado"
            ]);
        }
    }


        /**
         * Creates a new Categorias model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionBorrarcopia()
        {
        $raiz='../backups/sql';

        $dumper = new dumpDB();



        //$fichero="backup_2022-01-08_21-57-07.sql";
        if (isset($_GET['f']))
        {
            $fichero=$_GET['f']; //procesar
            $rutaFichero='../backups/sql/'.$fichero;

            if (file_exists($rutaFichero))
            {
                $sql = file_get_contents($rutaFichero);

                unlink($rutaFichero);

                $arrayFicheros=$dumper->listarArchivos('../backups/sql/');

                $gridViewDataProvider = new \yii\data\ArrayDataProvider([
                    'allModels' => $arrayFicheros,
                    'sort' => [
                        'attributes' => ['nombre'],

                    ],
                    'pagination' => ['pageSize' => 10]
                ]);


                return $this->render('index', [
                    'dataProvider' => $gridViewDataProvider,
                    "msg"=>"Copia de seguridad borrada --> ".$fichero,
                ]);
            }
            else
            {
                $arrayFicheros=$dumper->listarArchivos('../backups/sql/');

                $gridViewDataProvider = new \yii\data\ArrayDataProvider([
                    'allModels' => $arrayFicheros,
                    'sort' => [
                        'attributes' => ['nombre'],

                    ],
                    'pagination' => ['pageSize' => 10]
                ]);

                return $this->render('index', [
                    'dataProvider' => $gridViewDataProvider,
                    "msgError"=>"El fichero especificado no existe."
                ]);
            }
        }
        else{
            $arrayFicheros=$dumper->listarArchivos('../backups/sql/');

            $gridViewDataProvider = new \yii\data\ArrayDataProvider([
                'allModels' => $arrayFicheros,
                'sort' => [
                    'attributes' => ['nombre'],

                ],
                'pagination' => ['pageSize' => 10]
            ]);
            return $this->render('index', [
                'dataProvider' => $gridViewDataProvider,
                "msgError"=>"Fichero no especificado"
            ]);
        }

    }

    /**
         * Creates a new Categorias model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionBorrarcopiaficheros()
        {
        $raiz='../backups/imagenes';

        $dumper = new dumpDB();

        //$fichero="backup_2022-01-08_21-57-07.sql";
        if (isset($_GET['f']))
        {
            $fichero=$_GET['f']; //procesar
            $rutaFichero='../backups/imagenes/'.$fichero;

            if (file_exists($rutaFichero))
            {
                //$sql = file_get_contents($rutaFichero);

               $dumper->borrarDirectorio($rutaFichero);

                $arrayFicheros=$dumper->listarArchivos2('../backups/imagenes/');

                $gridViewDataProvider = new \yii\data\ArrayDataProvider([
                    'allModels' => $arrayFicheros,
                    'sort' => [
                        'attributes' => ['nombre'],

                    ],
                    'pagination' => ['pageSize' => 10]
                ]);


                return $this->render('indexficheros', [
                    'dataProvider' => $gridViewDataProvider,
                    "msg"=>"Copia de seguridad borrada --> ".$fichero,
                ]);
            }
            else
            {
                $arrayFicheros=$dumper->listarArchivos2('../backups/sql/');

                $gridViewDataProvider = new \yii\data\ArrayDataProvider([
                    'allModels' => $arrayFicheros,
                    'sort' => [
                        'attributes' => ['nombre'],

                    ],
                    'pagination' => ['pageSize' => 10]
                ]);

                return $this->render('indexficheros', [
                    'dataProvider' => $gridViewDataProvider,
                    "msgError"=>"El fichero especificado no existe."
                ]);
            }
        }
        else{
            $arrayFicheros=$dumper->listarArchivos2('../backups/imagenes/');

            $gridViewDataProvider = new \yii\data\ArrayDataProvider([
                'allModels' => $arrayFicheros,
                'sort' => [
                    'attributes' => ['nombre'],

                ],
                'pagination' => ['pageSize' => 10]
            ]);
            return $this->render('indexficheros', [
                'dataProvider' => $gridViewDataProvider,
                "msgError"=>"Fichero no especificado"
            ]);
        }

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
