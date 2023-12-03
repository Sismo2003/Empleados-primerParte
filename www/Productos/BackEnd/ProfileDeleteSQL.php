<?php
require "conecta.php";
$con = conecta();
$id = $_REQUEST['id'];
$sql = "UPDATE Products SET deleted = 1  , status = 0 WHERE id =$id";
$res = $con->query($sql);
echo $res;