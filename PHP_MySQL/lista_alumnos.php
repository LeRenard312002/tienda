<table  class="table table-bordered" cellspacing="0" cellpadding="0">
    <tr>
        <th>Id</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>telefono</th>
        <th>edad</th>
        <th>contraseña</th>
        <th>borrar</th>
    </tr>
    <?php
		// Mostrar labla de alumnosWW
        $sql = "SELECT * FROM alumnos ORDER BY id ASC";
        $query = $pdo->prepare($sql);
        $query->execute();
        $list = $query->fetchAll();
        foreach ($list as $rs) {
            ?>
            <tr>
            <td><?php echo $rs['id']; ?></td>
                <td><?php echo $rs['nombres']; ?></td>
                <td><?php echo $rs['apellidos']; ?></td>
                <td><?php echo $rs['email']; ?></td>
                <td><?php echo $rs['telefono']; ?></td>
                <td><?php echo $rs['edad']; ?></td>
                <td><?php echo $rs['contraseña']; ?></td>
                <td><a href="#" onclick="delete_member(<?php echo $rs['id']; ?>)"> Borrar</a></td>
            </tr>
            <?php
            
        }
    ?>
</table>