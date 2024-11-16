<?php
require_once 'app/models/model.php';
class ClientModel extends Model {

function GetAllClientes() {
  $query = $this->db->prepare("SELECT * FROM clientes");
  $query->execute();
  return $query->fetchAll(PDO::FETCH_OBJ);  
  }

  function getClientes($id_cliente){
    $query = $this->db->prepare("SELECT * FROM clientes WHERE id_cliente = ?");
    $query->execute([$id_cliente]);
    $cliente = $query->fetch(PDO::FETCH_OBJ);  
    return $cliente;
  }

  function deleteCliente($id){
    $query = $this->db->prepare("DELETE FROM clientes WHERE id_cliente = ?");
    $query->execute([$id]);
    return $this->db->lastInsertId();  
  }

  public function editarCliente($nombre, $apellido, $email, $telefono, $id_cliente) { 
    $query = $this->db->prepare('UPDATE clientes SET nombre = ?, apellido = ?, email = ?, telefono = ? WHERE id_cliente = ?');
    $resultado = $query->execute([$nombre, $apellido, $email, $telefono, $id_cliente]);
    return $resultado; // Retorna true si se ejecutó correctamente, false si hubo un error
  }
  
  function InsertCliente($nombre, $apellido, $email, $telefono){
    $query = $this->db->prepare("INSERT INTO clientes (nombre, apellido, email, telefono) VALUES (?, ?, ?, ?)");
    $query->execute([$nombre, $apellido, $email, $telefono]);
    return $this->db->lastInsertId();  
}

}

