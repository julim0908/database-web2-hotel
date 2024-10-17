<?php
class ClientModel {

      private function getConnection(){
        return new PDO('mysql:host=localhost;dbname=hotel_tandil;charset=utf8', 'root', '');
    }

    function getClient(){
        $db = $this->getConnection();
        $query = $db->prepare("SELECT * FROM clientes");
        $query->execute();
        $clients = $query->fetchAll(PDO::FETCH_OBJ); // Obtiene los resultados como objetos
        
        return $clients;
    }
}
?>
