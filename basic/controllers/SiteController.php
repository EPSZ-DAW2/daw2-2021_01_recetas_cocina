<?php

namespace app\controllers;

use app\models\Tiendaoferta;
use app\models\TiendaofertaSearch;
use app\models\TiendaSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\IngredienteSearch;
use app\models\RecetaSearch;
use app\models\Usuario;
use app\models\MenuSearch;
use app\models\PlanificacionSearch;
use app\models\CategoriasSearch;
use app\models\RecetaComentarios;
use app\models\Receta;
use app\models\RecetaCategorias;
use yii\helpers\ArrayHelper;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public function beforeAction($action)
    {
        if (isset(Yii::$app->user->identity->id))
        {
            if (Usuario::esUsuarioColaborador(Yii::$app->user->identity->id) ||
                Usuario::esUsuarioAdministrador(Yii::$app->user->identity->id) ||
                Usuario::esUsuarioSistema(Yii::$app->user->identity->id) ||
                Usuario::esUsuarioTienda(Yii::$app->user->identity->id) )
                $this->layout = 'private';
            else if (Yii::$app->user->isGuest){
                $this->layout = 'public';
            }
        }
        else {$this->layout = 'public';}

        return parent::beforeAction($action);
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout','login'],
                'rules' => [
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        //'actions' => ['logout','login'],
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
                       //'actions' => ['logout','login'],
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
                    //'actions' => ['logout','login','error'],
                    //Esta propiedad establece que tiene permisos
                    'allow' => true,
                    //Usuarios autenticados, el signo ? es para invitados
                    'roles' => ['?'],
                    //Este método nos permite crear un filtro sobre la identidad del usuario
                    //y así establecer si tiene permisos o no
                    'matchCallback' => function ($rule, $action) {
                       //Llamada al método que comprueba si es un usuario simple
                       return Yii::$app->user->isGuest;
                   },
                ],
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        //'actions' => ['logout','login'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return Usuario::esUsuarioTienda(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                    //Los usuarios simples tienen permisos sobre las siguientes acciones
                    //'actions' => ['logout','login'],
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
     //Controla el modo en que se accede a las acciones, en este ejemplo a la acción logout
     //sólo se puede acceder a través del método post
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RecetaSearch();

        $dataProvider = $searchModel->searchNmejores($this->request->queryParams);

        $modeloOfertas=Tiendaoferta::find()->orderBy([
            'id' => SORT_DESC,
        ])->limit(5)->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modeloOfertas'=>$modeloOfertas]);
    }

    public function actionVercategorias()
    {
            $searchModel = new CategoriasSearch();
            if (isset($_GET["CategoriasSearch"]["q"])) {
                $dataProvider = $searchModel->searchQ($this->request->queryParams);
            }
            else {
                $dataProvider = $searchModel->search($this->request->queryParams);
            }

            return $this->render('Categorias', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
    }
/*
    public function actionVerrecetascategoria()
    {
            $searchModel = new RecetaSearch(); //RecetasCategoriasSearch??
            if (isset($_GET["RecetaSearch"]["q"])) 
            {
                //$dataProvider = $searchModel->searchQ($this->request->queryParams);
                $filterall=RecetaCategorias::findAll(['id'=>$receta_id]); 
                $dataProvider = $searchModel->$filterall;
            
            
            }
            else {
                $dataProvider = $searchModel->search($this->request->queryParams);
            }
            //usar recetascategorias.php como vista
            return $this->render('Recetas', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider]);
    }
*/
 public function actionVerrecetascategoria($id)
    {
                //Buscamos todas las recetas
                $allrecetas=Receta::find()->all();
                //Buscamos las relaciones que tiene categoria con receta
                $filterall=RecetaCategorias::findAll(['categoria_id'=>$id]); 
                $idfilterall=ArrayHelper::map($filterall,'receta_id','receta_id');
                $categoriaReceta=array();
                //$arrayCategorias=array();
                foreach($allrecetas as $receta){
                    if(isset($idfilterall[$receta->id])){
                        $categoriaReceta[]=$receta;
                    }/*else{
                        $arrayCategorias[]=$categoria; 
                    }*/
                }
            
            //var_dump($categoriaReceta);
            //return;
            //usar recetascategorias.php como vista
            return $this->render('recetascategorias', [
               
                'categoriaReceta' => $categoriaReceta]);
    }


    public function actionCreatecomentario()
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
                    return $this->redirect(['verreceta', 'id' => $model->receta_id]);
                }
                
        
            }
        } else {//No vengo del post sino con valores por defecto
            $model->loadDefaultValues();
            $model->fechahora= date("Y-m-d H:i:s");
        }

        
    }




    /**
     * Muestra las fichas de los ingredientes de forma paginada
     *
     * @return string
     */
    public function actionVeringredientes()
    {
            $searchModel = new IngredienteSearch();
            if (isset($_GET["IngredienteSearch"]["q"])) {
                $dataProvider = $searchModel->searchQ($this->request->queryParams);
            }
            elseif (isset($_GET["IngredienteSearch"]["tipo"]))
            {
                $dataProvider = $searchModel->searchTipo($this->request->queryParams);
            }
            else
            {
                $dataProvider = $searchModel->search($this->request->queryParams);
            }

            return $this->render('ingredientes', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
    }

    /**
     * Muestra las fichas detallada de un ingrediente
     *
     * @return string
     */
    public function actionVeringrediente()
    {
        $titulo="Ficha detalle de Ingrediente";
        $searchModel = new IngredienteSearch();

        if (isset($_GET["id"]))
        {
            $dataProvider = $searchModel->searchID($this->request->queryParams);
            return $this->render('fichadetalleingrediente', [
                'titulo' => $titulo,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
        }
        else
        {
            $dataProvider = $searchModel->search($this->request->queryParams);
            return $this->render('fichadetalleingrediente', [
                'titulo' => $titulo,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
        }


    }

    /**
     * Muestra las fichas de los menús de forma paginada
     *
     * @return string
     */
    public function actionVermenus()
    {
            $searchModel = new MenuSearch();
            if (isset($_GET["MenuSearch"]["q"])) {
                $dataProvider = $searchModel->searchQ($this->request->queryParams);
            }
            else {
                $dataProvider = $searchModel->search($this->request->queryParams);
            }

            return $this->render('menus', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
    }

    /**
     * Muestra la ficha detallada de un menú
     *
     * @return string
     */
    public function actionVermenu()
    {
        $titulo="Ficha detalle de Menú";
        $searchModel = new MenuSearch();

        if (isset($_GET["id"]))
        {
            $dataProvider = $searchModel->searchID($this->request->queryParams);
            return $this->render('fichadetallemenu', [
                'titulo' => $titulo,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
        }
        else
        {
            $dataProvider = $searchModel->search($this->request->queryParams);
            return $this->render('fichadetallemenu', [
                'titulo' => $titulo,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
        }


    }

    /**
     * Muestra las fichas de los menús de forma paginada
     *
     * @return string
     */
    public function actionVerplanificaciones()
    {
            $searchModel = new PlanificacionSearch();
            if (isset($_GET["PlanificacionSearch"]["q"])) {
                $dataProvider = $searchModel->searchQ($this->request->queryParams);
            }
            else {
                $dataProvider = $searchModel->search($this->request->queryParams);
            }

            return $this->render('planificaciones', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
    }

    /**
     * Muestra la ficha detallada de un menú
     *
     * @return string
     */
    public function actionVerplanificacion()
    {
        $titulo="Ficha detalle de planificación";
        $searchModel = new PlanificacionSearch();

        if (isset($_GET["id"]))
        {
            $dataProvider = $searchModel->searchID($this->request->queryParams);
            return $this->render('fichadetalleplanificacion', [
                'nombre' => $titulo,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
        }
        else
        {
            $dataProvider = $searchModel->search($this->request->queryParams);
            return $this->render('fichadetalleplanificacion', [
                'nombre' => $titulo,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
        }


    }

    /**
     * Muestra las fichas de los tiendas de forma paginada
     *
     * @return string
     */
    public function actionVertiendas()
    {
        $searchModel = new TiendaSearch();
        if (isset($_GET["TiendaSearch"]["q"])) {
            $dataProvider = $searchModel->searchQ($this->request->queryParams);
        }
        elseif (isset($_GET["TiendaSearch"]["pob"])) {
            $dataProvider = $searchModel->searchPob($this->request->queryParams);
        }
        else {
            $dataProvider = $searchModel->search($this->request->queryParams);
        }

        return $this->render('tiendas', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,]);
    }

    /**
     * Muestra las fichas detallada de un ingrediente
     *
     * @return string
     */
    public function actionVertienda()
    {
        $titulo="Ficha detalle de Tienda";
        $searchModel = new TiendaSearch();

        if (isset($_GET["id"]))
        {
            $dataProvider = $searchModel->searchID($this->request->queryParams);
            return $this->render('fichadetalletienda', [
                'titulo' => $titulo,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
        }
        else
        {
            $dataProvider = $searchModel->search($this->request->queryParams);
            return $this->render('fichadetalletienda', [
                'titulo' => $titulo,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
        }

    }

    /**
     * Muestra las fichas de los tiendas de forma paginada
     *
     * @return string
     */
    public function actionVertiendaofertas()
    {

            $searchModel = new TiendaofertaSearch();
            if (isset($_GET["TiendaofertaSearch"]["q"])) {
                $dataProvider = $searchModel->searchQ($this->request->queryParams);
            }
            elseif (isset($_GET["TiendaofertaSearch"]["idq"]))
            {
                $dataProvider = $searchModel->search($this->request->queryParams);
            }
            elseif (isset($_GET["TiendaofertaSearch"]["tipo"]))
            {
                $dataProvider = $searchModel->searchTipo($this->request->queryParams);
            }
            else{
                $dataProvider = $searchModel->search($this->request->queryParams);

            }

            return $this->render('tiendaofertas', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);


    }

    /**
     * Muestra las fichas detallada de un ingrediente
     *
     * @return string
     */
    public function actionVertiendaoferta()
    {
        $titulo="Ficha detalle de la Oferta";
        $searchModel = new TiendaofertaSearch();

        if (isset($_GET["id"]))
        {
            $dataProvider = $searchModel->searchID($this->request->queryParams);
            return $this->render('fichadetalletiendaoferta', [
                'titulo' => $titulo,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
        }
        else
        {
            $dataProvider = $searchModel->search($this->request->queryParams);
            return $this->render('fichadetalletiendaoferta', [
                'titulo' => $titulo,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
        }

    }


        /**
     * Muestra las fichas de las recetas de forma paginada
     *
     * @return string
     */
    public function actionVerrecetas()
    {
            $searchModel = new RecetaSearch();
            if (isset($_GET["RecetaSearch"]["q"])) {
                $dataProvider = $searchModel->searchQ($this->request->queryParams);
            }
            else {
                $dataProvider = $searchModel->search($this->request->queryParams);
            }

            return $this->render('Recetas', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
    }

    /**
     * Muestra las fichas detallada de una Receta
     *
     * @return string
     */
    public function actionVerreceta()
    {
        $titulo="Ficha detalle de Receta";
        $searchModel = new RecetaSearch();

        if (isset($_GET["id"]))
        {
            $dataProvider = $searchModel->searchID($this->request->queryParams);
            $dataProvider2 = $searchModel->searchIngrediente($this->request->queryParams);

            //$modeloOfertas=Tiendaoferta::find()->orderBy([
             //   'id' => SORT_DESC,
            //])->limit(9)->all();

            return $this->render('fichadetallereceta', [
                'titulo' => $titulo,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'dataProvider2' => $dataProvider2,
                //'modeloOfertas'=>$modeloOfertas
            ]);
        }
        else
        {
            $dataProvider = $searchModel->search($this->request->queryParams);
            return $this->render('fichadetallereceta', [
                'titulo' => $titulo,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
        }
    }



    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
         

        if (!Yii::$app->user->isGuest) 
        {
            return $this->goHome();
        }

        $model = new LoginForm();
            
        if ($model->load(Yii::$app->request->post())){
            if( $model->login()) {
                Yii::$app->session['veces'] =0;
                return $this->goBack();

            }
            else{
                Yii::$app->session['veces'] = Yii::$app->session['veces'] + 1;
            }

        }

        

        
        //$veces=$veces+1;
        if(Yii::$app->session['veces'] > 5){
            return $this->render('error', [
                'model' => $model,
                'message' => "Número máximo de intentos alcanzado",
                'name' => "Bloqueado"
            ]); 
            //die('Número máximo de intentos alcanzado');
        
        }
        return $this->render('login', [
            'model' => $model,
            'msg' => Yii::$app->session['veces'],
        ]);

        
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->session['veces'] =0;
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    //funcion que llama a la vista de copias de seguridad
    public function actionCopiadeseguridad()
    {
        /*  //get all of the tables
         $db = new mysqli('localhost', 'root', '', 'daw2_recetas');
         $tables = '*';
    if($tables == '*'){
        $tables = array();
        $result = $db->query("SHOW TABLES");
        while($row = $result->fetch_row()){
            $tables[] = $row[0];
        }
    }else{
        $tables = is_array($tables)?$tables:explode(',',$tables);
    }

    //loop through the tables
    foreach($tables as $table){
        $result = $db->query("SELECT * FROM $table");
        $numColumns = $result->field_count;

        $return .= "DROP TABLE $table;";

        $result2 = $db->query("SHOW CREATE TABLE $table");
        $row2 = $result2->fetch_row();

        $return .= "nn".$row2[1].";nn";

        for($i = 0; $i < $numColumns; $i++){
            while($row = $result->fetch_row()){
                $return .= "INSERT INTO $table VALUES(";
                for($j=0; $j < $numColumns; $j++){
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = ereg_replace("n","n",$row[$j]);
                    if (isset($row[$j])) { $return .= '"'.$row[$j].'"' ; } else { $return .= '""'; }
                    if ($j < ($numColumns-1)) { $return.= ','; }
                }
                $return .= ");n";
            }
        }

        $return .= "nnn";
    }

    //save file
    $handle = fopen('db-backup-'.time().'.sql','w+');
    fwrite($handle,$return);
    fclose($handle);*/
   
        return $this->render('copiadeseguridad');
    } 

    public function actionRegister()
{
    $model = new Usuario();

    if(Yii::$app->session['veces'] > 5){
        return $this->render('error', [
            'model' => $model,
            'message' => "Número máximo de intentos alcanzado",
            'name' => "Bloqueado"
        ]); 
        //die('Número máximo de intentos alcanzado');
    
    }
    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            // form inputs are valid, do something here

            
            $model->email= $_POST['Usuario']['email'];
            $model->password= hash("sha1", $_POST['Usuario']['password']);
            $model->nombre= $_POST['Usuario']['nombre'];
            //$model->rol= "C";
            $model->aceptado= 0;
            $model->creado= date("Y-m-d H:i:s");
            
            if($model->save()){
                Yii::$app->session['veces'] =0;
                return $this->redirect(['login']);
            }


            return;
        }
    }

    return $this->render('register', [
        'model' => $model,
    ]);
}

    public function mapa($direccion){

        return $this->render('mapa', [
            'direccion'=>$direccion,
        ]);


    }
}
