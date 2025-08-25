<?php

namespace Controllers;

use Model\Categoria;
use Model\Dia;
use MVC\Router;

class EventosController
{

    /* Método principal */
    public static function index(Router $router)
    {
        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops',
        ]);
    }

    /* Método para crear un nuevo evento */
    public static function crear(Router $router)
    {

        $alertas = [];
        $categoria = Categoria::all('ASC');
        $dias = Dia::all('ASC');

        # debuguear($categoria);
        # debuguear($dias);

        $router->render('admin/eventos/crear', [
            'titulo' => 'Registrar Evento',
            'alertas' => $alertas,
            'categorias' => $categoria,
            'dias' => $dias
        ]);
    }
}
