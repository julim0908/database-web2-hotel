<?php
class ClientView {
    // Muestra la lista de clientes
    function showClient($clients) {
         $count = count($clients);
        require_once 'templates/lista_clientes.phtml';
    }
    function showError($msg){
        echo "<h1>ERROR! 404</h1>";
        echo "<h2> $msg </h1>";
    }
    function showReservacion($client, $reserv){
        require 'templates/reservas_de_clientes.phtml';
    }
    function showEditarForm($client){
        require 'templates/form_editar_cliente.phtml';
    }
}
?>
