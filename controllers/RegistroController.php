<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Ponente;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class RegistroController
{
    public static function crear(Router $router)
    {
        $router->render('registros/crear', [
            'titulo' => 'Finalizar Registro'
        ]);
    }
}
