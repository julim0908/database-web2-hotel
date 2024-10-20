<?php

 include "app/controllers/user_controller.php";
 include 'app/controllers/cliente_controller.php';
 require_once 'app/controllers/reservaciones_controller.php';



// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // acción por defecto si no se envía ninguna
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}



// Dividimos la acción en partes por si hay parámetros adicionales en la URL
$params = explode('/', $action);

switch ($params[0]) {
    case 'listarClientes':
        $controller = new ClientController();
        $controller->showClient();
        break;
    case 'home':
        $controller = new ClientController();
        $controller->showClient();
        break;
    case 'agregarClient':
        $controller = new ClientController();
        $controller->addClient();
        break;
    case 'eliminarCliente':
        $controller = new ClientController();
        $controller ->removeClient($params[1]);
        break;
    case 'reserva':
        $controller = new ClientController();
        $controller->showReservByClient($params[1]);
        break;
    case 'preEditarCliente':  
            $controller = new ClientController();
            $controller->preEdit($params[1]);
            break;
    case 'editarClient': 
            $controller = new ClientController();
            $controller->editarClient($params[1]);
            break;
//reservaciones
    case 'listar':
        $controller = new ReservacionController();
        $controller->showReservaciones();
        break;
    case 'agregar':
        $controller = new ReservacionController();
        $controller->addReservacion();
        break;
    case 'eliminarReservacion':
        $controller = new ReservacionController();
        $controller->removeReservation($params[1]);
        break;
    case 'clientes':
        $controller = new ReservacionController();
        $controller->showClientByReserv($params[1]);
        break;
    default: 
        header("HTTP/1.0 404 Not Found");
        echo "404 Page Not Found"; // Deberíamos llamar a un controlador que maneje esto
        break;
}
