<?php
    require "conecta.php";
    $con = conecta();
    $email = $_REQUEST['email'];
    $passw = $_REQUEST['passw'];
    $passEnc = md5($passw);

    $sql = "SELECT * FROM empleado 
             WHERE status = 1 AND eliminado = 0 
               AND correo = '$email' AND pass = '$passEnc'";
    $res = $con->query($sql);

    echo $res->num_rows;

?>