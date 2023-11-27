<?php
    require "conecta.php";
    $con = conecta();
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM empleado WHERE status = 1 AND eliminado = 0 AND id = $id";
    $res = $con->query($sql);

    while($row = $res->fetch_array()) {
        $id = $row["id"];
        $nombre = $row["nombre"];
        $apellido = $row["apellido"];
        $stats = $row['status'];
        $correo = $row["correo"];
        $rol = $row["rol"];
        if($rol == 1) $explirol = 'Gerente';
        else $explirol = 'Ejecutivo';
        if($stats == 1) $status = 'ACTIVO';
        else $status = 'INACTIVO';

    }

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta de empleados</title>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="programacion.js"></script>
        <link rel="stylesheet" href="styles/editEmployeesDB.css">
    </head>

    <body>
        <div class="topnav">
            <a href="tableempleoyees.php">Tabla de empleados</a>
            <a href="altaEmpleados.php">Registro de empleados</a>
            <a class="active" href="">Edicion de empleados</a>
        </div>
        <h1>Registro de empleado</h1>
        <div class="conteiner">
            <table class="tab">
                <form name="form1" id="Form1" method="post" action="editDB.php" >
                    <tr class="row">
                        <td class="cell"> <input  class="inputs" type="text" name="entryName" id="entryName" placeholder="Nombre" value="<?php echo $nombre?>" >  </td>
                    </tr>
                    <tr class="row">
                        <td class="cell"><input class="inputs" type="text" id="entrylastName" name="entrylastName" placeholder="Apellido" value="<?php echo $apellido?>"></td>
                    </tr>
                    <tr class="row">
                        <td class="cell">
                            <input class="inputs" id="entryEmail" name="entryEmail" placeholder="@gmail.com" value="<?php echo $correo;?>" onblur="editProfilevalid('<?php echo $correo;?>')">
                        </td>
                        <td class="cell" id="cellEmail"><div id="emailverfication" class="errormessageemail" ></div></td>
                    </tr>
                    <tr class="row">
                        <td class="cell"><input class="inputs pass"  type="text" name="pass" id="pass" placeholder="Password" ></td>
                    </tr>
                    <tr class="row">
                        <td class="cell">
                            <select class="selects" name="rol" id="rol" >
                                <option value="0" <?php echo ($rol == '0') ? 'selected' : ''; ?>>Selecciona</option>
                                <option value="1" <?php echo ($rol == '1') ? 'selected' : ''; ?>>Gerente</option>
                                <option value="2" <?php echo ($rol == '2') ? 'selected' : ''; ?>>Ejecutivo</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="row">
                        <td class="cell"><button class="buttons" type="submit" onclick="editvalid(<?php echo $id?>);return false;">ENVIAR</button></td>
                    </tr>
                    <tr class="row">
                        <td class="cell"><div class="errormessage" id="incompleateData"></div></td>
                    </tr>
                </form>
            </table>
        </div>
    </body>

</html>