<?php session_start();?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta lang="es-mx">
        <title>Bienvenido</title>

        <link rel="stylesheet" href="../styles/menu.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/flatly/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../styles/menu.css">
    </head>
    <body>
        <div class="topnav">
            <a href="menu.php" class="active">Bienvenido</a>
            <a href="exitSession.php" class="pull-right closeSesion">Cerrar Sesion</a>
        </div>
        <h1>Bienvenido  <?php echo  $_SESSION['userName']?></h1>
        <br><br>
        <div class="conteiner">
            <div class="subconteiner">
                <div class="list-group">
                    <a href="menu.php" class="list-group-item list-group-item-action active" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Bienvenidos</h5>
                        </div>
                        <p class="mb-1">Bienvenidos al registro de empleados</p>
                    </a>
                    <a href="empleoyeesTable.php" class="list-group-item list-group-item-action " aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Tabla de empleados</h5>
                        </div>
                        <p class="mb-1">Revisa a detalle la tabla de empleados registrados.</p>
                    </a>

                    <a href="createEmployee.php" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Crea un empleado</h5>
                        </div>
                        <p class="mb-1">Agrega un empleadoa la base de datos.</p>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Productos</h5>
                        </div>
                        <p class="mb-1">Revisa a detalle los prodcutos de la empresa</p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Promociones</h5>
                        </div>
                        <p class="mb-1">Revisa nuestras promociones del dia!</p>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Pedidos</h5>
                        </div>
                        <p class="mb-1">Revisa tus pedidos.</p>
                    </a>
                </div>
            </div>
        </div>



    </body>
</html>