<?php
require "../BackEnd/conecta.php";
$con = conecta();
$id = $_REQUEST['id'];
$sql = "SELECT * FROM empleado WHERE status = 1 AND eliminado = 0 AND id = $id";
$res = $con->query($sql);

while($row = $res->fetch_array()) {
    $id = $row["id"];
    $nombre = $row["nombre"];
    $apellido = $row["apellido"];
    $stats = $row['status'];
    $correo = $row["correo"];
    $rol = $row["rol"];
    if($rol == 1) $explirol = 'Gerente';
    else $explirol = 'Ejecutivo';
    if($stats == 1) $status = 'ACTIVO';
    else $status = 'INACTIVO';
    $srcPhoto = $row['archivo'];

}

?>

<html>
<head>
    <title>Detalles del perfil</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/seeProfileDetails.css">
    <script src="../javaScript/jquery-3.3.1.min.js"></script>
    <script src="../javaScript/employeesTable.js"></script>

</head>
<body>

    <div class="topnav">
        <a href="menu.php">Bienvenido</a>
        <a href="empleoyeesTable.php"> Tabla de empleados</a>
        <a href="createEmployee.php" >Registro de empleados</a>
        <a class="active">Perfil del Empleado</a>
        <a href="exitSession.php" class="pull-right closeSesion">Cerrar Sesion</a>
    </div>

<br><br><br>
<h1>Perfil del empleado</h1>
    <div class="conteiner">
        <div class="controllerConteiner">
            <div class="imageConteiner">
                <div><img class="imgs" src="<?php echo $srcPhoto ?>"></div>
            </div>
            <div class="textConteiner">
                <div class="subTextConteiner">
                    <div class="headerConteiner"><p>NOMBRE:</p></div>
                    <div class="bodyConteiner"><p><?php echo $nombre?> </p></div>
                </div>
                <div class="subTextConteiner">
                    <div class="headerConteiner"><p>APELLIDO:</p></div>
                    <div class="bodyConteiner"><p><?php echo $apellido?></p></div>
                </div>
                <div class="subTextConteiner">
                    <div class="headerConteiner"><p>CORREO:</p></div>
                    <div class="bodyConteiner"><p><?php echo $correo?></p></div>
                </div>
                <div class="subTextConteiner">
                    <div class="headerConteiner"><p>POSICION:</p> </div>
                    <div class="bodyConteiner"><p><?php echo $explirol?></p></div>
                </div>
                <div class="subTextConteiner">
                    <div class="headerConteiner"><p>STATUS:</p></div>
                    <div class="bodyConteiner"><p><?php echo $status?></p> </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


