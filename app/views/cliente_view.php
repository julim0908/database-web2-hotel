<?php
class ClientView {
    function showClient($clients) {
        require_once 'templates/lista_clientes.phtml';
    }

    function formEditCliente($cliente){
        require_once 'templates/editar_cliente.phtml';
    }

    public function showError($message) {
        echo $message;
    }
}