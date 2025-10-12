<?php

namespace Controllers;

use Model\Evento;
use Model\Registro;
use Model\Usuario;
use MVC\Router;

class DashboardController
{

    public static function index(Router $router)
    {

        // Obtener los últimos registros
        $registros = Registro::get(5);
        foreach ($registros as $registro) {
            $registro->usuario = Usuario::find($registro->usuario_id);
        }

        // Calcular los ingresos
        $virtuales = Registro::total('paquete_id', 2);
        $presenciales = Registro::total('paquete_id', 1);
        $ingresos = ($virtuales * 46.41) + ($presenciales * 189.54);

        // Obtener eventos con más y memos lugares disponibles
        $menos_lugares = Evento::ordenarLimite('disponibles', 'ASC', 5);
        $mas_lugares = Evento::ordenarLimite('disponibles', 'DESC', 5);
        # debuguear($menos_lugares);

        $router->render('admin/dashboard/index', [
            'titulo' => 'Dashboard administración',
            'registros' => $registros,
            'ingresos' => $ingresos,
            'menos_lugares' => $menos_lugares,
            'mas_lugares' => $mas_lugares

        ]);
    }
}
