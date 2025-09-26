<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\APIPonentes;
use Controllers\PaginasController;
use MVC\Router;
use Controllers\APIEventos;
use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\EventosController;
use Controllers\PonentesController;
use Controllers\RegalosController;
use Controllers\RegistradosController;

$router = new Router();


// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

// Áreaa de jdministración
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

/* PONENTES */
$router->get('/admin/ponentes', [PonentesController::class, 'index']);

# Crear un ponente
$router->get('/admin/ponentes/crear', [PonentesController::class, 'crear']);
$router->post('/admin/ponentes/crear', [PonentesController::class, 'crear']);

# Editar un ponente
$router->get('/admin/ponentes/editar', [PonentesController::class, 'editar']);
$router->post('/admin/ponentes/editar', [PonentesController::class, 'editar']);

#Eliminar a un ponente
$router->post('/admin/ponentes/eliminar', [PonentesController::class, 'eliminar']);

/* EVENTOS  */
$router->get('/admin/eventos', [EventosController::class, 'index']);

# Crear un evento
$router->get('/admin/eventos/crear', [EventosController::class, 'crear']);
$router->post('/admin/eventos/crear', [EventosController::class, 'crear']);

# API para las horas de los eventos
$router->get('/api/eventos-horario', [APIEventos::class, 'index']);
$router->get('/api/ponentes', [APIPonentes::class, 'index']);
$router->get('/api/ponente', [APIPonentes::class, 'ponente']);

# Editar un evento
$router->get('/admin/eventos/editar', [EventosController::class, 'editar']);
$router->post('/admin/eventos/editar', [EventosController::class, 'editar']);
$router->post('/admin/eventos/eliminar', [EventosController::class, 'eliminar']);

$router->get('/admin/registrados', [RegistradosController::class, 'index']);
$router->get('/admin/regalos', [RegalosController::class, 'index']);


/* ÁREA PÚBLICA */
$router->get('/', [PaginasController::class, 'index']);
$router->get('/devwebcamp', [PaginasController::class, 'evento']);
$router->get('/paquetes', [PaginasController::class, 'paquetes']);
$router->get('/workshops-conferencias', [PaginasController::class, 'conferencias']);
$router->get('/404', [PaginasController::class, 'error']);

$router->comprobarRutas();
