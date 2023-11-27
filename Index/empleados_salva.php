<?php 
    require "conecta.php";
    $con= conecta();
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['pass'];
    $rol = $_REQUEST['rol'];
    $archivo_n = '';
    $archivo = '';
    $passEnc = md5($pass);

    $sql = "INSERT INTO empleado
            (nombre, apellido,correo,pass,rol,archivo_n,archivo)
            VALUES ('$nombre', '$apellido','$correo','$passEnc' , $rol, '$archivo_n','$archivo')";
    $res = $con->query($sql);


 
?>