<?php

function debuguear($variable): string
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

function pagina_actual($path): bool
{
    return str_contains($_SERVER['PATH_INFO'] ?? '/', $path) ? true : false;
}

function is_auth(): bool
{
    if (!isset($_SESSION)) {
        session_start();
    }

    return isset($_SESSION['nombre']) && !empty($_SESSION);
}

function is_admin(): bool
{
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['admin']) && !empty($_SESSION);
}

function aos_animacion(): void
{
    $afectos = ['fade-up', 'fade-down', 'fade-right', 'fade-left', 'flip-left', 'flip-right', 'flip-up', 'flip-down', 'zoom-in', 'zoom-in-up', 'zoom-in-down', 'zoom-out', 'zoom-out-up', 'zoom-out-down'];

    $efecto = array_rand($afectos, 1);
    echo ' data-aos="' . $afectos[$efecto] . '" ';
}
