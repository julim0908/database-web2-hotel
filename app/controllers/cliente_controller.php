<?php
    
include_once 'app/models/cliente_model.php';
include_once 'app/views/cliente_view.php';

class ClientController {
    private $model;
    private $view;

    function __construct (){
        $this->model = new ClientModel();
        $this->view = new ClientView();
    }

    function showClientes(){
        $client = $this->model->getAllClientes();
        $this->view->showClient($client);
    }
    function RemoveCliente($id){
        $this->model->deleteCliente($id);
        header('location: '. BASE_URL);
    }
//editar cliente
public function mostrarFormEditCliente($id_cliente){
    $cliente = $this->model->getClientes($id_cliente);
    if ($cliente) {
        $this->view->formEditCliente($cliente);
    } else {
        echo "Cliente no encontrado.";
    }
}

//Actualizar cliente
public function modificarCliente($id_cliente) {
    
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
 
    if ($nombre && $apellido && $email && $telefono) {
        $resultado = $this->model->editarCliente($nombre, $apellido, $email, $telefono, $id_cliente);
        
        if ($resultado) {
            header('Location: ' . BASE_URL);
        } else {
            echo "Error al actualizar el cliente.";
        }
    } else {
        echo "Faltan datos. No se puede actualizar el cliente.";
    }
}


//Añadir cliente
    function insertarCliente(){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];

        if(empty($nombre) || empty($apellido) || empty($email) || empty($telefono)){
            $this->view->showError("Faltan campos obligatorios!");
            return; // Detiene la ejecución si faltan campos
        }

        $this->model->InsertCliente($nombre, $apellido, $email, $telefono);
        header('location: '.BASE_URL);
    }
        
     
}

?>