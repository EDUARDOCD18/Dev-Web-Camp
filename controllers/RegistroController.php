<?php

namespace Controllers;

use Model\Paquete;
use Model\Registro;
use Model\Usuario;
use Model\Categoria;
use Model\Dia;
use Model\Ponente;
use Model\Hora;
use Model\Evento;
use Model\Regalo;
use MVC\Router;

class RegistroController
{
    public static function crear(Router $router)
    {

        // Verificar si la sesión está iniciada
        if (!is_auth()) {
            header('Location: /login');
        }

        // Verificar si el usuario ya está registrado
        $registro = Registro::where('usuario_id', $_SESSION['id']);
        if (isset($registro) && $registro->paquete_id === "3") {
            header('Location: /boleto?id=' . urlencode($registro->token));
        }

        $router->render('registros/crear', [
            'titulo' => 'Finalizar Registro'
        ]);
    }

    public static function gratis(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!is_auth()) {
                header('Location: /login');
            }

            $registro = Registro::where('usuario_id', $_SESSION['id']);
            if (isset($registro) && $registro->paquete_id === "3") {
                header('Location: /boleto?id=' . urlencode($registro->token));
            }


            $token = substr(md5(uniqid(rand(), true)), 0, 8);

            # debuguear($token);

            // Crear el registro
            $datos = array(
                'paquete_id' => 3,
                'pago_id' => '',
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            );

            $registro = new Registro($datos);
            # debuguear($registro);
            $resultado = $registro->guardar();

            if ($resultado) {
                header('Location: /boleto?id=' . urlencode($token));
            }
        }
    }

    public static function boleto(Router $router)
    {

        // Validar la URL
        $id = $_GET['id'];

        if (!$id || strlen($id) !== 8) {
            header('Location: /login');
        }

        // Buscar en la base de datos
        $registro = Registro::where('token', $id);

        if (!$registro) {
            header('Location: /login');
        }

        // Llenar las tablas de referencia
        $registro->usuario = Usuario::find($registro->usuario_id);
        $registro->paquete = Paquete::find($registro->paquete_id);

        # debuguear($registro);

        $router->render('registros/boleto', [
            'titulo' => 'Asistencia a DevWebCamp',
            'registro' => $registro
        ]);
    }

    public static function pagar(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!is_auth()) {
                header('Location: /login');
            }

            // Validar que el POST no venga vacío
            if (empty($_POST)) {
                echo json_encode([]);
                return;
            }

            // Crear el registr
            $datos = $_POST;
            $datos = substr(md5(uniqid(rand(), true)), 0, 8);
            $datos['usuario_id'] = $_SESSION['id'];

            try {
                $registro = new Registro($datos);
                $resultado = $registro->guardar();
                echo json_encode($resultado);
            } catch (\Throwable $th) {
                echo json_encode(['resultado' => 'error']);
                return;
            }
        }
    }

    public static function conferencias(Router $router)
    {

        // Verificar si el usuario está autenticado
        if (!is_auth()) {
            header('Location: /login');
        }

        // Validar que el usuario tenga el plan presencial
        $usuario_id = $_SESSION['id'];
        $registro = Registro::where('usuario_id', $usuario_id);

        $eventos = Evento::ordenar('hora_id', 'ASC');
        $eventos_formateados = [];

        /* Iterar en las conferencias del viernes */
        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = dia::find($evento->dia_id);
            $evento->hora = hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);

            if ($evento->dia_id === "1" && $evento->categoria_id === "1") {
                $eventos_formateados['conferencias_v'][] = $evento;
            }
        }

        /* Iterar en las conferencias del sábado */
        foreach ($eventos as $evento) {
            if ($evento->dia_id === "2" && $evento->categoria_id === "1") {
                $eventos_formateados['conferencias_s'][] = $evento;
            }
        }

        /* Iterar en las Workshops del viernes */
        foreach ($eventos as $evento) {
            if ($evento->dia_id === "1" && $evento->categoria_id === "2") {
                $eventos_formateados['workshops_v'][] = $evento;
            }
        }

        /* Iterar en las Workshops del sábado */
        foreach ($eventos as $evento) {
            if ($evento->dia_id === "2" && $evento->categoria_id === "2") {
                $eventos_formateados['workshops_s'][] = $evento;
            }
        }

        if ($registro->paquete_id !== "1") {
            header('Location:/');
        }

        $regalos = Regalo::all('ASC');

        // Manejando el registro por medio de POST 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar que el usuario esté registrado
            if (!is_auth()) {
                header('Location: /login');
            }

            $eventos = explode(',', $_POST['eventos']);

            if (empty($eventos)) {
                echo json_encode(['resultado' => false]);
                return;
            }

            // Obtener el registro del usuario
            $registro = Registro::where('usuario_id', $_SESSION['id']);
            if (!isset($eventos) || $registro->paquete_id !== "1") {
                echo json_encode(['resultado' => false]);
                return;
            }


            // Validar la disponibilidad de los evento seleccionados
            foreach ($eventos as $evento_id) {
                $evento = Evento::find($evento_id);

                if (!isset($evento) || $evento->disponibles === "0") {
                    echo json_encode(['resultado' => false]);
                    return;
                }

                $evento->disponibles -= 1;
                debuguear($evento);
            }

        }

        $router->render('registros/conferencias', [
            'titulo' => 'Elegir Conferencias & workshops',
            'eventos' => $eventos_formateados,
            'regalos' => $regalos
        ]);
    }
}
