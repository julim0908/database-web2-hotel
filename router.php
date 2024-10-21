<?php
 //require_once 'app/libs/response.php';
 //require_once 'app/middlewares/sessionAuthMiddleware.php';
 //include "app/controllers/user_controller.php";
 include 'app/controllers/cliente_controller.php';
 require_once 'app/controllers/reservaciones_controller.php';




// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

//$res= new Response();

$action = 'listar'; // acción por defecto si no se envía ninguna
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}



// Dividimos la acción en partes por si hay parámetros adicionales en la URL
$params = explode('/', $action);

switch ($params[0]) {
    case 'listarClientes':
       // sessionAuthMiddleware($res);
        $controller = new ClientController();
        $controller->showClient();
        break;
    case 'home':
        $controller = new ClientController();
        $controller->showClient();
        break;
    case 'agregarClient':
        //sessionAuthMiddleware($res);
        $controller = new ClientController();
        $controller->addClient();
        break;
    case 'eliminarCliente':
       // sessionAuthMiddleware($res);
        $controller = new ClientController();
        $controller ->removeClient($params[1]);
        break;
    case 'reserva':
       // sessionAuthMiddleware($res);
        $controller = new ClientController();
        $controller->showReservByClient($params[1]);
        break;
    case 'preEditarCliente':  
       // sessionAuthMiddleware($res);
        $controller = new ClientController();
        $controller->preEdit($params[1]);
        break;
    case 'editarClient': 
       // sessionAuthMiddleware($res);
        $controller = new ClientController();
        $controller->editarClient($params[1]);
        break;
//reservaciones
    case 'listar':
       // sessionAuthMiddleware($res);
        $controller = new ReservacionController();
        $controller->showReservaciones();
        break;
    case 'agregar':
       // sessionAuthMiddleware($res);
        $controller = new ReservacionController();
        $controller->addReservacion();
        break;
    case 'eliminarReservacion':
       // sessionAuthMiddleware($res);
        $controller = new ReservacionController();
        $controller->removeReservation($params[1]);
        break;
    case 'clientes':
       // sessionAuthMiddleware($res);
        $controller = new ReservacionController();
        $controller->showClientByReserv($params[1]);
        break;
    /*case 'showFormLogin':
        $controller = new UserController();
        $controller->showFormLogin($params[1]);
        break;
    case 'login':
        $controller = new UserController();
        $controller->login($params[1]);
        break;*/
    default: 
        header("HTTP/1.0 404 Not Found");
        echo "404 Page Not Found"; // Deberíamos llamar a un controlador que maneje esto
        break;
}
