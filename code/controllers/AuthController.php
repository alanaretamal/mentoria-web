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
    $this->setLayout('auth');
    if($request->isPost()){
      $registerModel = new RegisterModel();

      $registerModel->loadData($request->getBody());
      
      var_dump($registerModel);

      if(empty($registerModel->firstname))
      {

      }

      if($registerModel->validate() && $registerModel->save()){
        return 'Success';
      }
      var_dump($registerModel->errors);
      return "Procesando datos del formulario";
    }
    return $this->render('register');
  }
    
}