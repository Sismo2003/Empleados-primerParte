<?php
    require "conecta.php";
    $con = conecta();
    $id = $_REQUEST['id'];
    $New_nombre = $_REQUEST['nombre'];
    $New_apellido = $_REQUEST['apellido'];
    $New_correo = $_REQUEST['correo'];
    $New_pass = $_REQUEST['pass'];
    $New_rol = $_REQUEST['rol'];
    $archivo_n = '';
    $archivo = '';
    $valuesUpdated = 0;

    $sql = "SELECT * FROM empleado WHERE status = 1 AND eliminado = 0 AND id = $id";
    $res = $con->query($sql);

    while($row = $res->fetch_array()) {
        $id = $row["id"];
        $Register_nombre = $row["nombre"];
        $Register_apellido = $row["apellido"];
        $stats = $row['status'];
        $Register_correo = $row["correo"];
        $Register_pass = $row['pass'];
        $Register_rol = $row["rol"];
    }

    $passEnc = md5($New_pass);
   // $valuesUpdated = 0;

    if ($New_nombre != $Register_nombre) {
        $sql = "UPDATE empleado SET nombre='$New_nombre' WHERE id = $id";
        $res = $con->query($sql);
        $valuesUpdated++;
    }
    if ($New_apellido != $Register_apellido) {
        $sql = "UPDATE empleado SET apellido='$New_apellido' WHERE id = $id";
        $res = $con->query($sql);
        $valuesUpdated++;
    }
    if ($New_correo != $Register_correo) {
        $sql = "UPDATE empleado SET correo='$New_correo' WHERE id = $id";
        $res = $con->query($sql);
        $valuesUpdated++;
    }
    if ($New_pass != 'NULLFLAGXF2A0DC036' and $passEnc != $Register_pass) {
        $sql = "UPDATE empleado SET pass='$passEnc' WHERE id = $id";
        $res = $con->query($sql);
        $valuesUpdated++;
    }
    if($Register_rol != $New_rol){
        $sql = "UPDATE empleado SET rol='$New_rol' WHERE id = $id";
        $res = $con->query($sql);
        $valuesUpdated++;
    }



    echo $valuesUpdated;
?>
