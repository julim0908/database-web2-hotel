<?php
class ClientView {
    function showClient($clients) {
        if (!empty($clients)) { ?>
            <h2>Lista de Clientes</h2>
            <table>
                <tr><th>Nombre</th><th>Apellido</th><th>Email</th><th>Teléfono</th></tr>
                <?php
                // Recorre los clientes y los imprime en una tabla
                foreach ($clients as $client) { ?>
                    <tr>
                        <td><?php echo $client->nombre; ?></td> 
                        <td><?php echo $client->apellido; ?></td> 
                        <td><?php echo $client->email; ?></td> 
                        <td><?php echo $client->telefono; ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else {
            echo '<p>No hay clientes disponibles.</p>';
        }
    }
}
?>
