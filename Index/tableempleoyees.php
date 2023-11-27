<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>B3</title>
        <link rel="stylesheet" href="styles/tablaempleados.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="programacion.js"></script>
    </head>
    <body>
        <div class="topnav">
            <a class="active" href="tableempleoyees.php">Tabla de empleados</a>
            <a href="altaEmpleados.php">Registro de empleados</a>
        </div>
        <br>
        <h1>Tabla de empleados</h1>
        <br>     <br><br><br>
        <div class="conteiner">
            <table>
                <tr class="TableHeader">
                    <th class="id">ID</th>
                    <th class="name">NOMBRE</th>
                    <th class="email">CORREO</th>
                    <th class="rol">ROL</th>
                    <th >VER</th>
                    <th >EDITAR</th>
                    <th >ELIMINAR</th>
                </tr>
                <?php
                require "conecta.php";
                $con = conecta();
                $sql = "SELECT * FROM empleado
                        WHERE status = 1 AND eliminado = 0";
                $res = $con->query($sql);
                while($row = $res->fetch_array()) {
                $id = $row["id"];
                $nombre = $row["nombre"];
                $apellido = $row["apellido"];
                $correo = $row["correo"];
                $rol = $row["rol"];
                if($rol == 1) $explirol = 'Gerente';
                else $explirol = 'Ejecutivo';
                ?>
                <tr>
                    <td class="id"><?php echo $id ?></td>
                    <td class="name"><?php echo $nombre ?></td>
                    <td class="email"><?php echo $correo ?></td>
                    <td class="rol"><?php echo $explirol ?></td>
                    <td class="buttons"><button type="submit" onclick="profileDetails(<?php echo $id ?>)">Ver</button></td>
                    <td class="buttons"><button type="submit" onclick="editProfile(<?php echo $id ?>)">Editar</button></td>
                    <td class="buttons" ><button onclick="deleteThis(this,<?php echo $id ?>);return false;">Eliminar</button></td>
                </tr>
                <?php }?>
            </table>
        </div>
    </body>


</html>