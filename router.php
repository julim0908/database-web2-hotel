<?php 
require_once 'libs/response.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once "app/middlewares/verifyAuthMiddleware.php";
require_once 'app/controllers/Auth.controller.php';
require_once 'app/controllers/cliente_controller.php';
require_once 'app/controllers/reservacion_controller.php';


// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

$action = 'listarClientes'; // acción por defecto si no se envía ninguna
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// Dividimos la acción en partes por si hay parámetros adicionales en la URL
$params = explode('/', $action);

switch ($params[0]) {
    case 'listarClientes':
        //sessionAuthMiddleware($res);
        $controller = new ClientController();
        $controller->showClientes();
        break;
    case 'EliminarCliente':
        //sessionAuthMiddleware($res);
        //verifyAuthMiddleware($res);
        $controller = new ClientController();
        $controller->RemoveCliente($params[1]);
        break;
    case 'EditarCliente':
        //sessionAuthMiddleware($res);
        //verifyAuthMiddleware($res);
        $controller = new ClientController();
        $controller->mostrarFormEditCliente($params[1]);
        break;
    case 'ActualizarCliente':
        //sessionAuthMiddleware($res);
        //verifyAuthMiddleware($res);
        $controller = new ClientController();
        $controller->modificarCliente($params[1]);
        break;
    case 'agregarClient':
        //sessionAuthMiddleware($res);
        //verifyAuthMiddleware($res);
        $controller = new ClientController();
        $controller->insertarCliente();
        break;
    //RESERVACIONES
    case 'listarReservas':
        $controller = new ReservacionController();
        $controller->ShowReservaciones();
        break;
    case 'eliminarReserva':
        $controller = new ReservacionController();
        $controller->removeReservation($params[1]);
        break;
    case 'AgregarReserva':
        $controller = new ReservacionController();
        $controller->AddReservacion();
        break;
    case 'editarReservacion':
        $controller = new ReservacionController();
        $controller->showFormEditReservation($params[1]);
        break;
    case 'ActualizarReserva':
        $controller = new ReservacionController();
        $controller->updateReservation($params[1]);
        break;
    //LOGIN
    case 'showLogin':
        $controller = new AuthController();
        $controller->ShowLogin();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->Login();
        break;
    case 'Logout':
          $controller = new AuthController();
         $controller->logout();
         break;
    default: 
        header("HTTP/1.0 404 Not Found");
        echo "404 Page Not Found"; // Deberíamos llamar a un controlador que maneje esto
        break;
}
