<?php
namespace app\controllers;

use app\core\Controller;


class SiteController extends Controller
{
    public function home()
    {
      $params =[
        'name' =>'Juan Perez',
        'surname' => 'Perez',
      ];
      return $this->render('home',$params);
    }
    public function contact()
    {
       return $this->render('contact');
    }
    public function handlecontact()
    {
       return "Procesando Informacion";
    }
  
}
