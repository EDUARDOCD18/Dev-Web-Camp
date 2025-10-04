<?php

namespace Controllers;

use Model\Paquete;
use Model\Registro;
use Model\Usuario;
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
}
