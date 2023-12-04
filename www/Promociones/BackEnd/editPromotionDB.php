<?php
    require "conecta.php";
    session_start();
    $con = conecta();
    $id = $_REQUEST['id'];
    $valuesUpdated=0;
    $new_item = $_REQUEST['PromotionName'];

    $sql = "SELECT * FROM Offers WHERE status = 1 AND deleted = 0 AND id = $id";
    $res = $con->query($sql);
    while($row = $res->fetch_array()) {
        $id = $row["id"];
        $oldName = $row["name"];
        $file = $row["archivo"];
    }
if ($new_item != $oldName) {
    $sql = "UPDATE Offers SET name='$new_item' WHERE id = $id";
    $res = $con->query($sql);
    $valuesUpdated++;
}


if(isset($_FILES['picture'])) {
    if ($_FILES['picture']['error'] == UPLOAD_ERR_OK) {
        $archivo_name = $_FILES['picture']['name'];
        $archivo_tmp = $_FILES['picture']['tmp_name'];
        $archivo_md5_FinalName = md5($archivo_tmp);
        $type = explode(".", $archivo_name);
        $archivo = '../imgs/' . $archivo_md5_FinalName . '.' . $type[1];

        $sql = "SELECT archivo FROM Offers WHERE status = 1 AND deleted = 0 AND id = $id";
        $res = $con->query($sql);
        $row = $res->fetch_array();
        $Register_File = $row['archivo'];

        if ($Register_File != $archivo) {
            $archivo_n = $archivo_name;
            move_uploaded_file($archivo_tmp, $archivo);
            $sql = "UPDATE Offers SET archivo='$archivo' WHERE id = $id";
            $res = $con->query($sql);
            $valuesUpdated++;
        }
    } else {
        echo 'No cambios';
    }
}
echo $valuesUpdated;
header('Location: ../FrontEnd/showOffers.php');
exit();
?>

