<?php
    require "conecta.php";
    $con = conecta();
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM empleado WHERE status = 1 AND eliminado = 0 AND id = $id";
    $res = $con->query($sql);

    while($row = $res->fetch_array()) {
    $id = $row["id"];
    $nombre = $row["nombre"];
    $apellido = $row["apellidos"];
    $stats = $row['status'];
    $correo = $row["correo"];
    $rol = $row["rol"];
    if($rol == 1) $explirol = 'Gerente';
    else $explirol = 'Ejecutivo';
    if($stats == 1) $status = 'ACTIVO';
    else $status = 'INACTIVO';
    }

?>
        
<html>
    <head>
        <title>Detalles del perfil</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/Profile.css">
        <script src="js/jquery-3.3.1.min.js"></script>
    </head>1
    <body>
        <div class="topnav">
            <a href="tableempleoyees.php">Tabla de empleados</a>
            <a href="altaEmpleados.php">Registro de empleados</a>
            <a class="active">Perfil del Empleado</a>
        </div>
        <br><br><br>
        <h1>Perfil del empleado</h1>
        <div class="conteiner">
            <table class="tb">
                <tr class="TableHeader">
                    <th class="id">ID</th>
                    <th class="name">NOMBRE</th>
                    <th class="email">CORREO</th>
                    <th class="rol">ROL</th>
                    <th class="stats">STATUS</th>
                    <th class="photo">FOTO</th>
                    <th class="delete">ELIMINAR</th>
                </tr>
                <tr>
                    <td class="id"><?php echo $id ?></td>
                    <td class="name"><?php echo $nombre." ". $apellido ?></td>
                    <td class="email"><?php echo $correo ?></td>
                    <td class="rol"><?php echo $explirol ?></td>
                    <td class="stats"><?php echo $status ?></td>
                    <td class="photo">imagen</td>
                    <td class="buttons" ><button onclick="deleteThis(this,<?php echo $id ?>);return false;">Eliminar</button></td>
                </tr>
            </table>
        </div>
    </body>
</html>

