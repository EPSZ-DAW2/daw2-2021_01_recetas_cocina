<?php

namespace app\controllers;

use app\models\TiendaofertaSearch;
use app\models\TiendaSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Ingrediente;
use app\models\IngredienteSearch;
use app\models\Receta;
use app\models\RecetaSearch;
use app\helpers\Html;
use app\models\Usuario;
use app\models\Menu;
use app\models\MenuSearch;
use app\models\Planificacion;
use app\models\PlanificacionSearch;




class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,]);
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
            return $this->render('fichadetallereceta', [
                'titulo' => $titulo,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,]);
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
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
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

    public function actionRegister()
{
    $model = new Usuario();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            // form inputs are valid, do something here

            
            $model->email= $_POST['Usuario']['email'];
            $model->password= hash("sha1", $_POST['Usuario']['password']);
            $model->nombre= $_POST['Usuario']['nombre'];
            $model->rol= "C";
            $model->aceptado= 0;
            $model->creado= date("Y-m-d H:i:s");
            
            if($model->save()){
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


        return render('mapa', [
            'url' => $url,
            'direccion'=>$direccion,
        ]);


    }
}
