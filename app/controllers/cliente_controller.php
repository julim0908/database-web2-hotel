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

    function showClient(){
        $client = $this->model->getAllClients();
        $this->view->showClient($client);
        
    }
        function addClient() {
            // Verificar que los campos existan y no estén vacíos
            if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['email']) || empty($_POST['telefono'])) {
                $this->view->showError("Falta llenar campos obligatorios");
                return;
                 }
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $email = $_POST['email'];
                $telefono = $_POST['telefono'];

                $id = $this->model->InsertClient($nombre, $apellido, $email, $telefono);
                header('location: '. BASE_URL);
                }

             function removeClient($id){
                $this->model->deleteClient($id);
                header('location: '. BASE_URL);
                 }

            function showReservByClient($id){
                $client = $this->model->getClient($id);
                $reserv = $this->model->getReservationByClient($id);
                $this->view->showReservacion($client, $reserv);
            }

            function preEdit($id_cliente){
                $client = $this->model->getClient($id_cliente);
                $this->view->showEditarForm($client);
            }

            function editarClient($id_cliente) {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $nombre = trim($_POST["nombre"]);
                    $apellido = trim($_POST["apellido"]);
                    $email = trim($_POST["email"]);
                    $telefono = trim($_POST["telefono"]);
                    var_dump($_POST); // Esto imprimirá todos los datos que se están enviando
                    exit;
                }
                
                    if (empty($nombre) || empty($apellido) || empty($email) || empty($telefono)) {
                        $this->view->showError('Faltan campos obligatorios!');
                        return;
                    }
                    $id = $this->model->editarCliente($id_cliente, $nombre, $apellido, $email, $telefono);

                    if ($id) {
                        header('location: '. BASE_URL. 'listar');
                    } else {
                        $this->view->showError('Error al editar cliente!');
                    }
                }
            }


?>
