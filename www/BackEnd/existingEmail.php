<?php
require "conecta.php";
$con = conecta();
$email = $_REQUEST['correo'];

$sql = "SELECT * FROM empleado WHERE status = 1 AND eliminado = 0 AND correo = '$email'";
$res = $con->query($sql);
echo $res->num_rows
?>

