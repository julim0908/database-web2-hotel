<?php
include_once 'app/models/reservacion_model.php';
include_once 'app/views/reservacion_view.php';

class ReservacionController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new ReservacionModel();
        $this->view = new ReservacionView();
    }

    function showReservaciones() {
        $reservacion = $this->model->getReservacion();
        $this->view->showReservaciones($reservacion);   
    }

    function addReservacion() {
        // Verificar que los campos existan y no estén vacíos
        if (empty($_POST['numeroHabitacion']) || empty($_POST['entrada']) || empty($_POST['salida']) || empty($_POST['monto'])) {
            $this->view->showError("Falta llenar campos obligatorios");
            return;
        }

        // Asignar los valores
        $numero_habitacion = $_POST['numeroHabitacion'];
        $fecha_entrada = $_POST['entrada'];
        $fecha_salida = $_POST['salida'];
        $monto = $_POST['monto'];
        $idCliente = $_POST['id_cliente'];
        $id = $this->model->insertReservacion($numero_habitacion, $fecha_entrada, $fecha_salida, $monto, $idCliente);
        header('location:' . BASE_URL);
    }

    function removeReservation($id) {
        $this->model->deleteReservation($id);
        header('location: ' . BASE_URL);
    }

    function showClientByReserv($id) {
        $reserv = $this->model->getReservacion($id);
        $client = $this->model->getClientByReservation($id);
        $this->view->showClient($client, $reserv);
    }   
}
?>
