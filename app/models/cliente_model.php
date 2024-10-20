<?php
class ClientModel {

      private function getConnection(){
        return new PDO('mysql:host=localhost;dbname=hotel_tandil;charset=utf8', 'root', '');
    }

    function GetAllClients() {
        $db = $this->getConnection();
        $query = $db->prepare("SELECT * FROM clientes");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);  
    }

    function getClient($id) {
        $db = $this->getConnection();
        $query = $db->prepare("SELECT * FROM clientes WHERE id_cliente = ?");
        $query->execute([$id]);
        $client = $query->fetchAll(PDO::FETCH_OBJ);  
        return $client; 
    }
    
    function InsertCliente($nombre, $apellido, $email, $telefono) {
        $db = $this->getConnection();
        $query = $db->prepare("INSERT INTO clientes (nombre, apellido, email, telefono) VALUES (?, ?, ?, ?)");
        $query->execute([$nombre, $apellido, $email, $telefono]);
        return $db->lastInsertId();  
    }

    function deleteClient($id){
        $db = $this->getConnection();
        $query = $db->prepare("DELETE FROM clientes WHERE id_cliente = ?");
        $query->execute([$id]);
        return $db->lastInsertId();  
    }

    function getReservationByClient($id){
        $db = $this->getConnection();
        $query = $db->prepare("SELECT * FROM reservaciones WHERE id_cliente = ?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);

    }
    function editarClient($id_cliente,$nombre, $apellido, $email, $telefono) {
        $db = $this->getConnection();
        $query = $this->$db->prepare("UPDATE clientes SET nombre = ?, apellido = ?, email = ?, telefono = ? WHERE id_cliente = ?");
        $result = $query->execute([$id_cliente,$nombre, $apellido, $email, $telefono]);
        return $result;
    }

}
?>
