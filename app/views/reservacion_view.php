<?php
class ReservacionView {
    function showReservaciones($Reservaciones) {
        $count = count($Reservaciones);
        require_once 'templates/lista_reservaciones.phtml';
    }
    function showError($msg){
        echo "<h1>ERROR! 404</h1>";
        echo "<h2> $msg </h1>";
    }

    function showClient($client,$reserv){
        require './templates/clientes.phtml';
    }
}

?>

