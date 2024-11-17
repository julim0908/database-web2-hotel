<?php
class ReservacionModel extends model {

    function getReservacion()
    {
        $query = $this->db->prepare("SELECT * FROM reservaciones");
        $query->execute();
        $reservacion = $query->fetchAll(PDO::FETCH_OBJ); // Obtiene los resultados como objetos
       // var_dump($Reservacion);
        return $reservacion;
    }

    function insertReservacion($numero_habitacion, $fecha_entrada, $fecha_salida, $monto, $idCliente)
    {
        $query = $this->db->prepare("INSERT INTO reservaciones (numero_habitacion, fecha_entrada, fecha_salida, monto, id_cliente) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$numero_habitacion, $fecha_entrada, $fecha_salida, $monto, $idCliente]);


        return $this->db->lastInsertId();  
    }

    function deleteReservation($id){
        $query = $this->db->prepare("DELETE FROM reservaciones WHERE id_reservacion = ?");
        $query->execute([$id]);
        return $this->db->lastInsertId();
    }
    
    function getClientByReservation($id){
        $query = $this->db->prepare("SELECT * FROM clientes WHERE id_cliente = ?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);

    }

    public function updateReservationByClient($numero_habitacion, $fecha_entrada, $fecha_salida, $monto, $id_reservacion){
        $query = $this->db->prepare("UPDATE reservaciones SET numero_habitacion = ?, fecha_entrada = ?, fecha_salida = ?, monto = ? WHERE id_reservacion = ?");
    
        $success = $query->execute([$numero_habitacion, $fecha_entrada, $fecha_salida, $monto, $id_reservacion]);
        
        $rowCount = $query->rowCount();
        if ($success && $rowCount > 0) {
            return true;
        } else {
            return false; 
        }
    }
    
    public function getReservaById($idReserva) {
        // Preparar la consulta SQL para obtener la reserva por su ID
        $query = $this->db->prepare("SELECT * FROM reservaciones WHERE id_reservacion = ?");
        $query->execute([$idReserva]);
        
        // Obtener el resultado
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    

}