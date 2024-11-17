<?php
class ReservacionView {
    function showReservaciones($reservacion) {
        require_once 'templates/lista_reservaciones.phtml';
    }
    function showError($message){
        echo "<h1>ERROR! 404</h1>";
        echo "<h2> $message </h1>";
    }

    function showClient($client,$reserv){
        require './templates/clientes.phtml';
    }

    public function showEditReservationForm($reserva) {
        require_once './templates/editar_form_reserva.phtml';
    }
}

?>

