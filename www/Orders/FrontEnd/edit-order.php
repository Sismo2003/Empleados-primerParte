<?php
session_start();?>


<html>
<head>
    <title>Editar pedido</title>
    <meta charset="UTF-8">
    <meta lang="ES">
    <script src="../Js/jquery-3.3.1.min.js"></script>
    <script src="../Js/table.js"></script>
    <link rel="stylesheet" href="../Styles/TUCSSAQUI.css">
    <link rel="stylesheet" href="../Styles/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" >Hola  <?php  echo $_SESSION['userName'];?>! </a>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link " href="../../FrontEnd/menu.php">
                        Bienvenido
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="orders-Table.php">Tabla de pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../Productos/FrontEnd/productTable.php">Nuevo Pedido</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="order-Details.php">Editar Pedido</a>
                    <span class="visually-hidden">(current)</span>

                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../../Productos/FrontEnd/exitSession.php">Cerrar Sesion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>




</body>
</html>
