<?php

namespace app\controllers;

//use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller{

    public function home(){
        //return Application::$app->router->renderView('home');
        $params=[
            'name' => 'Alana',
            'surname' => 'Retamal'
        ];
        return $this->render('home', $params);
    }

    public function contact(){
        //return Application::$app->router->renderView('contact');
        return $this->render('contact');
    }

    public function handleContact(Request $request){
        /*$body = Application::$app->request->getBody();
        var_dump($body);*/
        $body = $request->getBody();
        //var_dump($body);
        // exit;
        
        // Validar Datos, por ejemplo Rut
        // Crear Modelo, por ejemplo save en BD
        // Mensaje informativo
        
        return "Procesando informacion";
    }
}