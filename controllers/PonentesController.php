<?php

namespace Controllers;

use Model\Ponente;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController
{

    /* Método principal */
    public static function index(Router $router)
    {
        $ponentes = Ponente::all();
        # debuguear($ponentes);

        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencistas',
            'ponentes' => $ponentes
        ]);
    }

    # Método para registrar o crear a los ponentes
    public static function crear(Router $router)
    {
        $alertas = [];
        $ponente = new Ponente;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            # Leer imagen
            if (!empty($_FILES['imagen']['tmp_name'])) {

                $carpeta_imagenes = '../public/img/speakers';

                // Crear la carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            }

            # Colocar las redes como un string
            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);


            $ponente->sincronizar($_POST);

            // Validar 
            $alertas = $ponente->validar();

            // Guardar el registro
            if (empty($alertas)) {
                // Buscar las imágenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

                // Guardar registro en la base de datos
                $resultado = $ponente->guardar();

                if ($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }

        $router->render('admin/ponentes/crear', [
            'titulo' => 'Regisrar conferencista',
            'ponente' => $ponente,
            'alertas' => $alertas
        ]);
    }

    # Método para editar a un ponente
    public static function editar(Router $router)
    {

        $alertas = [];

        # Validar el ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        # Si el ID no es válido, redirecciona
        if (!$id) {
            header('Location: /admin/ponentes');
        }

        # Obtener el ponente a editar
        $ponente = Ponente::find($id);

        # Si el ponente no existe, redirecciona
        if (!$ponente) {
            header('Location: /admin/ponentes');
        }

        $router->render('admin/ponentes/editar', [
            'titulo' => "Editar registro",
            'ponente' => $ponente,
            'alertas' => $alertas
        ]);
    }
}
