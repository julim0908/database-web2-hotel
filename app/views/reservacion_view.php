<?php
    
class ReservacionView {
    function showReservacion($Reservaciones) {
        require './templates/form.php';
        
        if (!empty($Reservaciones)) { ?>
            <h2>Lista de Reservaciones</h2>
            <table>
                <tr><th>Numero de habitacion</th><th>Fecha de entrada</th><th>Fecha de salida</th><th>Monto</th><th>id reservacion</th></tr>
                <?php
                // Recorre las reservaciones y las imprime en una tabla
                foreach ($Reservaciones as $Reservacion) { ?>
                    <tr>
                        <td><?php echo $Reservacion->numero_habitacion; ?></td> 
                        <td><?php echo $Reservacion->fecha_entrada; ?></td> 
                        <td><?php echo $Reservacion->fecha_salida; ?></td> 
                        <td><?php echo $Reservacion->monto; ?></td>
                        <td><?php echo $Reservacion->id_reservacion; ?></td>
                        <td>
                            <a href="<?php echo 'editarReservacion/'.$Reservacion->id_reservacion ?>">Editar</a>
                            <a href="<?php echo 'eliminarReservacion/'.$Reservacion->id_reservacion?> ">Eliminar</a>
                            <a href="<?php echo BASE_URL; ?>cliente/<?php echo $Reservacion->id_cliente; ?>">Ver clientes</a>

                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else {
            echo '<p>No hay reservaciones disponibles.</p>';
        }
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

