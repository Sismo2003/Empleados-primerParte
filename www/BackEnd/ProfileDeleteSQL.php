<?php
require "conecta.php";
$con = conecta();
$id = $_REQUEST['id'];
$sql = "UPDATE empleado SET eliminado = 1 WHERE id =$id";
$res = $con->query($sql);
echo $id;