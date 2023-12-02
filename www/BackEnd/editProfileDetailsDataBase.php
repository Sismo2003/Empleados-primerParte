<?php
require "conecta.php";
session_start();
$con = conecta();
$id = $_REQUEST['id'];
$New_nombre = $_REQUEST['entryName'];
$New_apellido = $_REQUEST['entryLastName'];
$New_correo = $_REQUEST['entryEmail'];
$New_pass = $_REQUEST['pass'];
$New_rol = $_REQUEST['rol'];

$valuesUpdated = 0;

$archivo_name = $_FILES['picture']['name'];
$archivo_tmp = $_FILES['picture']['tmp_name'];
$archivo_md5_FinalName = md5($archivo_tmp);
$type = explode(".",$archivo_name);
$archivo = '../imgs/' . $archivo_md5_FinalName.'.'.$type[1];

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
    $Register_File = $row['archivo'];
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
if($Register_File != $archivo and $archivo != 'NULLVALUEFORPICTUREX456' ){
    $archivo_n = $archivo_name;
    move_uploaded_file($archivo_tmp, $archivo);
    $sql = "UPDATE empleado SET archivo='$archivo' , archivo_n = '$archivo_n' WHERE id = $id";

    $res = $con->query($sql);
    $valuesUpdated++;
}


header("Location: ../FrontEnd/empleoyeesTable.php");
?>
