<?php

namespace Controllers;

use Model\Categoria;
use Model\Dia;
use Classes\Paginacion;
use Model\Evento;
use Model\Hora;
use Model\Ponente;
use MVC\Router;

class EventosController
{

    /* Método principal */
    public static function index(Router $router)
    {
        // Validar que el usuaruio sea un admin
        if (!is_admin()) {
            header('Location /login');
        }
        
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if (!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/eventos?page=1');
        }

        $por_pagina = 10;
        $total_eventos = Evento::total();
        $paginacion = new Paginacion($pagina_actual, $por_pagina, $total_eventos);

        $eventos = Evento::paginar($por_pagina, $paginacion->offset());

        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
        }

        # debuguear($eventos);
        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops',
            'eventos' => $eventos,
            'paginacion' => $paginacion->paginacion()
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

            // Validar que el usuaruio sea un admin
            if (!is_admin()) {
                header('Location /login');
            }

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

    /* Método para editar un nuevo evento */
    public static function editar(Router $router)
    {

        // Validar que el usuaruio sea un admin
        if (!is_admin()) {
            header('Location /login');
        }

        $alertas = [];
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if (!$id) header('Location: /admin/eventos');


        $categoria = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');

        $evento = Evento::find($id);
        if (!$evento) header('Location: /admin/eventos');

        # debuguear($categoria);
        # debuguear($dias);
        # debuguear($horas);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Validar que el usuaruio sea un admin
            if (!is_admin()) {
                header('Location /login');
            }

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

        $router->render('admin/eventos/editar', [
            'titulo' => 'Editar Evento',
            'alertas' => $alertas,
            'categorias' => $categoria,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }

    # Método para eliminar un evento
    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Validar que el usuaruio sea un admin
            if (!is_admin()) {
                header('Location /login');
            }

            $id = $_POST['id'];
            $evento = Evento::find($id);

            if (isset($evento)) {
                header('Location: /admin/eventos');
            }

            $resultado = $evento->eliminar();
            if ($resultado) {
                header('Location: /admin/eventos');
            }

            # debuguear($ponente);
        }
    }
}
