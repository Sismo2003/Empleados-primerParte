<?php
require "conecta.php";
session_start();
$con = conecta();
$id = $_REQUEST['id'];
$New_item = $_REQUEST['item'];
$New_code = $_REQUEST['code'];
$New_descr = $_REQUEST['desc'];
$New_price = $_REQUEST['price'];
$New_rol = $_REQUEST['rol'];

$valuesUpdated = 0;

$archivo_name = $_FILES['picture']['name'];
$archivo_tmp = $_FILES['picture']['tmp_name'];
$archivo_md5_FinalName = md5($archivo_tmp);
$type = explode(".",$archivo_name);
$archivo = '../imgs/' . $archivo_md5_FinalName.'.'.$type[1];

$sql = "SELECT * FROM Products WHERE status = 1 AND deleted = 0 AND id = $id";
$res = $con->query($sql);

while($row = $res->fetch_array()) {
    $id = $row["id"];
    $productName = $row["product_name"];
    $productCode = $row["product_code"];
    $productDescription = $row["product_description"];
    $productCost = $row["product_cost"];
    $productStock = $row["product_stock"];
    $file = $row["archivo"];
}


if ($New_item != $productName) {
    $sql = "UPDATE Products SET product_name='$New_item' WHERE id = $id";
    $res = $con->query($sql);
    $valuesUpdated++;
}
if ($New_code != $productCode) {
    $sql = "UPDATE Products SET product_code='$New_code' WHERE id = $id";
    $res = $con->query($sql);
    $valuesUpdated++;
}
if ($New_descr!= $productDescription) {
    $sql = "UPDATE Products SET product_description='$New_descr' WHERE id = $id";
    $res = $con->query($sql);
    $valuesUpdated++;
}
if ($New_price!= $productCost) {
    $sql = "UPDATE Products SET product_cost='$New_price' WHERE id = $id";
    $res = $con->query($sql);
    $valuesUpdated++;
}
if($New_rol != $productStock){
    $sql = "UPDATE Products SET product_stock='$New_rol' WHERE id = $id";
    $res = $con->query($sql);
    $valuesUpdated++;
}
if($file != $archivo and $archivo != 'NULLVALUEFORPICTUREX456' ){
    $archivo_n = $archivo_name;
    move_uploaded_file($archivo_tmp, $archivo);
    $sql = "UPDATE Products SET archivo='$archivo' , archivo_n = '$archivo_n' WHERE id = $id";

    $res = $con->query($sql);
    $valuesUpdated++;
}
echo $valuesUpdated;

header('Location: ../FrontEnd/productTable.php');
exit();
?>
