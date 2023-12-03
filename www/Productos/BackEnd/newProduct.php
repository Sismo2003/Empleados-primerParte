<?php


require "conecta.php";
$con = conecta();
$item = $_REQUEST['item'];
$code = $_REQUEST['code'];
$description = $_REQUEST['desc'];
$price = $_REQUEST['price'];
$rol = $_REQUEST['rol'];

$archivo_name = $_FILES['picture']['name'];
$archivo_tmp = $_FILES['picture']['tmp_name'];
$archivo_md5_FinalName = md5($archivo_tmp);
$archivo_n = $archivo_name;
$type = explode(".", $archivo_name);
$archivo = '../imgs/' . $archivo_md5_FinalName . '.' . $type[1];
$sql = "INSERT INTO Products
                    (product_name, product_code,product_description,product_cost,product_stock,archivo_n,archivo)
                    VALUES ('$item', '$code','$description','$price' , $rol, '$archivo_n','$archivo')";
$res = $con->query($sql);
move_uploaded_file($archivo_tmp, $archivo);
header("Location: ../FrontEnd/productTable.php");
