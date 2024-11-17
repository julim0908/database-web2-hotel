<?php
include_once './app/models/reservacion_model.php';
include_once './app/views/reservacion_view.php';

class ReservacionController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new ReservacionModel();
        $this->view = new ReservacionView();
    }

    function ShowReservaciones() {
        $reservacion = $this->model->getReservacion();
        $this->view->showReservaciones($reservacion);   
    }

    function AddReservacion() {
        // Asignar los valores
        $numero_habitacion = $_POST['numeroHabitacion'];
        $fecha_entrada = $_POST['entrada'];
        $fecha_salida = $_POST['salida'];
        $monto = $_POST['monto'];
        $idCliente = $_POST['id_cliente'];
        
        // Verificar que los campos existan y no estén vacíos
        if (empty($numero_habitacion) || empty($fecha_entrada) || empty($fecha_salida) || empty($monto) || empty($idCliente)) {
            $this->view->showError("Falta llenar campos obligatorios");
            return;
        }        
    
        $this->model->insertReservacion($numero_habitacion, $fecha_entrada, $fecha_salida, $monto, $idCliente);
        header('Location:' . BASE_URL . 'listarReservas');
    }


    function removeReservation($id) {
        $this->model->deleteReservation($id);
        header('location: ' . BASE_URL . 'listarReservas');
    }

    

    public function showFormEditReservation($idReserva) {
        $reserva = $this->model->getReservaById($idReserva);
        if ($reserva) {
            $this->view->showEditReservationForm($reserva);
        } else {
            $this->view->showError("Reserva no encontrada");
        }
    }
    
    public function updateReservation($idReserva) {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $numero_habitacion = $_POST['numeroHabitacion'] ?? null;
            $fecha_entrada = $_POST['entrada'] ?? null;
            $fecha_salida = $_POST['salida'] ?? null;
            $monto = $_POST['monto'] ?? null;
        
            if (empty($numero_habitacion) || empty($fecha_entrada) || empty($fecha_salida) || empty($monto)) {
                $this->view->showError("Faltan llenar campos obligatorios.");
                return;
            }  
        
            $updateReservation = $this->model->updateReservationByClient($numero_habitacion, $fecha_entrada, $fecha_salida, $monto, $idReserva);
            
            if ($updateReservation) {
                header('Location: ' . BASE_URL . 'listarReservas');
                exit;
            } else {
                $this->view->showError("Error al actualizar la reservación.");
            }
        }
    }
    
}
?>
