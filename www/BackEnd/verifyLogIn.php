<?php
    session_start();
    require "conecta.php";
    $con = conecta();
    $email = $_REQUEST['email'];
    $passw = $_REQUEST['passw'];
    $passEnc = md5($passw);

    $sql = "SELECT * FROM empleado 
                 WHERE status = 1 AND eliminado = 0 
                   AND correo = '$email' AND pass = '$passEnc'";
    $res = $con->query($sql);

    $existingAccount  = $res->num_rows;
    if($existingAccount == 1 ){
        $row =  $res->fetch_array();
        $id = $row['id'];
        $name = $row['nombre'];

        $_SESSION['userId'] = $id;
        $_SESSION['userName'] = $name;
        $_SESSION['userEmail'] = $email;
    }
    echo $existingAccount;
?>