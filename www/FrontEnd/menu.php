<html>
    <head>
        <meta charset="UTF-8">
        <meta lang="es-mx">
        <title>Bienvenido</title>
        <link rel="stylesheet" href="../styles/menu.css">
    </head>
    <body>
        <div class="topnav">
            <a href="menu.php" class="active">Bienvenido</a>
            <a href="empleoyeesTable.php">Tabla de empleados</a>
            <a href="createEmployee.php">Registro de empleados</a>
            <a href="">Productos</a>
            <a href="">Promociones</a>
            <a href="">Pedidos</a>
            <a href="exitSession.php">Cerrar Sesion</a>
        </div>
        <h1>Bienvenido</h1>
        <?php echo  $_SESSION['userName']?>


    </body>
</html>