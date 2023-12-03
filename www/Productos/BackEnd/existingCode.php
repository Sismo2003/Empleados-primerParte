<?php

require "conecta.php";
$con = conecta();
$ref = $_REQUEST['code'];

$sql = "SELECT * FROM Products WHERE status = 1 AND deleted = 0 AND product_code = '$ref'";
$res = $con->query($sql);
echo $res->num_rows;

?>