<?php
    require "conecta.php";
    $con= conecta();
    $nombre = $_REQUEST['name'];
    $apellido = $_REQUEST['lastname'];
    $correo = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    $rol = $_REQUEST['rol'];

    $passEnc = md5($pass);
    $archivo_name = $_FILES['picture']['name'];
    $archivo_tmp = $_FILES['picture']['tmp_name'];
    $archivo_md5_FinalName = md5($archivo_tmp);
    $archivo_n = $archivo_name;
    $type = explode(".",$archivo_name);
    $archivo = '../imgs/' . $archivo_md5_FinalName.'.'.$type[1];
    $sql = "INSERT INTO empleado
                    (nombre, apellido,correo,pass,rol,archivo_n,archivo)
                    VALUES ('$nombre', '$apellido','$correo','$passEnc' , $rol, '$archivo_n','$archivo')";
    $res = $con->query($sql);
    move_uploaded_file($archivo_tmp, $archivo);
    header("Location: ../FrontEnd/empleoyeesTable.php");
    exit();
?>