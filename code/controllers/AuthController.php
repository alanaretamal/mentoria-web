<?php
namespace app\controllers;

use app\core\Request;
use app\core\Controller;
use app\models\RegisterModel;

class AuthController extends Controller
{

  public function login()
  {
    return $this->render('login');
    
  }
  public function register(Request $request)
  {
    
    if($request->isPost()){
      $registerModel = new RegisterModel();
      return "Procesando datos del formulario";
    }
    return $this->render('register');
  }
    
}