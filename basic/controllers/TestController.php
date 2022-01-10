<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class TestController extends Controller
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

        return true;
    }

    /**
     * Pagina de los Test para ver si funciona el JUI y Bootstrap5.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionBuscarLenguaje( $term=null)
    {
      //Aqui se puede hacer la búsqueda de datos con el dato de consulta
      //recibido. Cualquier consulta en Base de Datos es posible haciendo
      //la adaptación necesaria. Al final se debe obtener un JSON con los
      //datos que queremos devolver como búsqueda para que el componente
      //"JuiAutocomplete" pueda recibirlos.
      $json= [];
      if (!empty( $term)) {
        //Simular una busqueda como si se consultara a una base de datos y
        //con los modelos o registros obtenidos, se preparan los elementos en
        //el array "$json" como espera el "Autocomplete".
        $datos= [ 
            'c', 'c++', 'java', 'php', 'coldfusion', 'javascript', 
            'asp', 'ruby', 'perl', 'python', 'ada', 'cobol', 'erlang', 
            'pascal', 'c#' 
        ];
        asort( $datos);//Ordenar los datos.
        foreach( $datos as $i => $lenguaje) {
          if (preg_match( '/'.preg_quote( $term).'/iu', $lenguaje)) {
            $json[]= ['id'=>$i, 'label'=>$lenguaje, 'value'=>$lenguaje];
          }//if
        }//foreach
        
      }//if
      Yii::$app->response->format= \yii\web\Response::FORMAT_JSON;
      Yii::$app->response->charset= 'UTF-8';
      return $json;
    }
    
}
