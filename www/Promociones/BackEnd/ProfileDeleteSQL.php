<?php
require "conecta.php";
$con = conecta();
$id = $_REQUEST['id'];
echo $id;
$sql = "UPDATE Offers SET deleted = 1  , status = 0 WHERE id ='$id'";
$res = $con->query($sql);
echo $res;