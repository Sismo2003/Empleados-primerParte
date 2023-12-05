<?php
 session_start();
 ?>

<html>
    <head>
        <title>Tabla de pedidos</title>
        <meta charset="UTF-8">
        <meta lang="ES">
        <script src="../Js/jquery-3.3.1.min.js"></script>
        <script src="../Js/table.js"></script>
        <link rel="stylesheet" href="../Styles/orderTable.css">
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
                                <a class="nav-link active" href="orders-Table.php">Tabla de pedidos</a>
                            <span class="visually-hidden">(current)</span>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../Productos/FrontEnd/productTable.php">Nuevo Pedido</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../../Productos/FrontEnd/exitSession.php">Cerrar Sesion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="main">
            <div class="conteiner">
                <table>
                    <tr class="TableHeader">
                        <th class="th-products  cell">Peido ID</th>
                        <th class="th-products  cell">Cliente</th>
                        <th class="th-product   cell">Cliente ID</th>
                        <th class="th-products  cell">Fecha</th>
                        <th class="th-products  cell">Status</th>
                        <th class="th-products  cell">Detalle</th>
                        <th class="th-products  cell">Completado</th>
                    </tr>
                    <?php
                    require "../BackEnd/conecta.php";
                    $con = conecta();
                    $sql = "SELECT * FROM pedidos
                                    WHERE status = 1";
                    $res = $con->query($sql);
                    while($row = $res->fetch_array()) {
                        $userOrderId = $row["id"];
                        $userOrderClientId = $row['client_id'];
                        $userOrderDate = $row['date'];
                        $userOrderStatus = $row['status'];
                        $userNameSQL ="SELECT * FROM empleado WHERE id='$userOrderClientId'";
                        $nameRes = $con->query($userNameSQL);
                        if($userOrderStatus == 1) $finalStatus = 'En proceso';
                        else $finalStatus = 'Entregado';

                        while($row2 = $nameRes->fetch_array()) {
                            $userClientName = $row2['nombre'];
                        ?>
                        <tr>
                            <td class="cell"><?php echo $userOrderId ?></td>
                            <td class="cell"><?php echo $userClientName?></td>
                            <td class="cell"><?php echo $userOrderClientId?></td>
                            <td class="cell"><?php echo $userOrderDate?></td>
                            <td class="cell"><?php echo $finalStatus?></td>
                            <td class="buttons cell"><button type="submit" onclick="orderDetails(<?php echo $userOrderId ?>)">Detalles</button></td>
                            <td class="buttons cell"><button type="submit" onclick="orderReady('id')">Editar</button></td>
                        </tr>
                    <?php }}?>
                </table>

            </div>
        </div>


    </body>
</html>
