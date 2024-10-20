<?php
class ReservacionModel
{
    private function getConnection()
    {
        return new PDO('mysql:host=localhost;dbname=hotel_tandil;charset=utf8', 'root', '');
    }

    function getReservacion()
    {
        $db = $this->getConnection();
        $query = $db->prepare("SELECT * FROM reservaciones");
        $query->execute();
        $Reservacion = $query->fetchAll(PDO::FETCH_OBJ); // Obtiene los resultados como objetos
       // var_dump($Reservacion);
        return $Reservacion;
    }

    function insertReservacion($numero_habitacion, $fecha_entrada, $fecha_salida, $monto, $idCliente)
    {
        // Cambiado a getConnection()
        $db = $this->getConnection();

        // Consulta corregida para insertar los datos
        $query = $db->prepare("INSERT INTO reservaciones (numero_habitacion, fecha_entrada, fecha_salida, monto, id_cliente) VALUES (?, ?, ?, ?, ?)");
        
        // Ejecución de la consulta
        $query->execute([$numero_habitacion, $fecha_entrada, $fecha_salida, $monto,$idCliente]);
        return $db->lastInsertId();
    }

    function deleteReservation($id){
        $db = $this->getConnection();
        $query = $db->prepare("DELETE FROM reservaciones WHERE id_reservacion = ?");
        $query->execute([$id]);
        return $db->lastInsertId();
    }
    
    function getClientByReservation($id){
        $db = $this->getConnection();
        $query = $db->prepare("SELECT * FROM clientes WHERE id_cliente = ?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);

    }
}