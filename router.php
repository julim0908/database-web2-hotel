<?php
require_once 'app/controllers/cliente_controller.php';


// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // acción por defecto si no se envía ninguna
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// Dividimos la acción en partes por si hay parámetros adicionales en la URL
$params = explode('/', $action);

// Cambiamos el switch para trabajar con $params[0] si está definido
switch ($params[0]) {
    case 'listar':
        $controller = new ClientController();
        $controller->showClient();
        break;
    default: 
        header("HTTP/1.0 404 Not Found");
        echo "404 Page Not Found"; // Deberíamos llamar a un controlador que maneje esto
        break;
}
