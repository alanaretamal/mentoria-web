<?php
namespace app\Controllers;

use app\core\Application;

class SiteController
{
    public function home()
    {
       return Application::$app->router->renderView('home');
    }
    public function contact()
    {
        return Application::$app->router->renderView('contact');
    }
    public function handlecontact()
    {
       return "Procesando Informacion";
    }
}
