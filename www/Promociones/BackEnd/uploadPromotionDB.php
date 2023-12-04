<?php
    require 'conecta.php';
    $con = conecta();
    $product = $_REQUEST['PromotionName'];
    $file_tmp=$_FILES['picture']['tmp_name'];

    $archivo_name = $_FILES['picture']['name'];
    $archivo_tmp = $_FILES['picture']['tmp_name'];
    $archivo_md5_FinalName = md5($archivo_tmp);
    $archivo_n = $archivo_name;
    $type = explode(".", $archivo_name);
    $archivo = '../imgs/' . $archivo_md5_FinalName . '.' . $type[1];
    $sql = "INSERT INTO Offers
                        (name, archivo)
                        VALUES ('$product', '$archivo')";
    $res = $con->query($sql);
    move_uploaded_file($archivo_tmp, $archivo);
    header("Location: ../FrontEnd/showOffers.php");
?>