<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public function home()
    {
      return $this->render('home',[
        'name' =>'Juan Perez',
        'surname' => 'Perez',
      ]);
    }
    public function contact()
    {
       return $this->render('contact');
    }
    public function handlecontact(Request $request)
    {
      $body = $request->getBody();
   
       return "Procesando Informacion";
    }
  
}
