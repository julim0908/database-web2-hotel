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
        $client = $this->model->getClient();
        $this->view->showClient($client);
        
    }
    
}
?>
