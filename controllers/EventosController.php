<?php

namespace Controllers;

use Model\Categoria;
use Model\Dia;
use Model\evento;
use Model\Hora;
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
        $horas = Hora::all('ASC');

        $evento = new Evento;

        # debuguear($categoria);
        # debuguear($dias);
        # debuguear($horas);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $evento->sincronizar($_POST);
            $alertas = $evento->validar();

            if (empty($alertas)) {
                // Guardar el evento
                $resultado = $evento->guardar();
                if ($resultado) {
                    header('Location: /admin/eventos');
                }
            }
        }

        $router->render('admin/eventos/crear', [
            'titulo' => 'Registrar Evento',
            'alertas' => $alertas,
            'categorias' => $categoria,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }
}
