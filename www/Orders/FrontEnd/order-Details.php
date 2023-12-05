<?php
session_start();
?>

<html>
    <head>
        <title>Detalles de pedidos</title>
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
                        <a class="nav-link " href="orders-Table.php">Tabla de pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../Productos/FrontEnd/productTable.php">Nuevo Pedido</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="order-Details.php">Detalles del Pedido</a>
                        <span class="visually-hidden">(current)</span>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../../Productos/FrontEnd/exitSession.php">Cerrar Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <?php
    require '../BackEnd/conecta.php';
    $con = conecta();

    $userOrderId = $_REQUEST['id'];
    $sql = "SELECT * FROM items_orders WHERE order_id = '$userOrderId'";
    $res = $con->query($sql);
    while ($row = $res->fetch_array()) {
        $userProductId = $row['product_id'];
        $userProductAmount = $row['amount'];
        $productoSQL = "SELECT * FROM Products WHERE status = 1 AND deleted = 0 AND id='$userProductId'";
        $ProductRes = $con->query($productoSQL);
        while($row1 = $ProductRes->fetch_array()) {
            $id = $row1["id"];
            $productName = $row1["product_name"];
            $productCode = $row1["product_code"];
            $productDescription = $row1["product_description"];
            $productCost = $row1["product_cost"];
            $productStock = $row1["product_stock"];
            $file = $row1["archivo"];
            $pedidosSQL = "SELECT * FROM pedidos WHERE status = 1 AND id='$userOrderId'";
            $pedidosRes = $con->query($pedidosSQL);
            while ($row2 = $pedidosRes->fetch_array()){
                $fecha= $row2['date'];
                $status= $row2['status'];
                if($status == 1) $checkStatus = 'En proceso de enviado';
                else $checkStatus = 'Producto entragado con exito'



    ?>


        <div class="detailsConteiner">
            <div class="detailsSubConteiner">

                <div class="card mb-3">
                    <h3 class="card-header"><?php echo $productName?></h3>
                    <div class="card-body">
                        <h5 class="card-title">Gracias Por Tu compra!</h5>
                        <h6 class="card-subtitle text-muted"><?php echo $checkStatus?></h6>
                    </div>

                    <img src="../../Productos/FrontEnd/<?php echo $file?>" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
                    <div class="card-body">
                        <p class="card-text"><?php echo $productDescription ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Precio</strong>:  $<?php echo $productCost ?>.00</li>
                        <li class="list-group-item"><strong>Codigo</strong>: <?php echo $productCode?></li>
                        <li class="list-group-item"><strong>Disponibilidad</strong>: <?php echo $productStock?></li>
                        <li class="list-group-item"><strong>Cantidad Comprados</strong>: <?php echo $userProductAmount?></li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Entregado</a>
                        <a href="#" class="card-link">Editar Pedido</a>
                    </div>
                    <div class="card-footer text-muted">
                        <?php echo $fecha?>
                    </div>
                </div>

            </div>
        </div>
    <?php }    } }?>

    </body>
</html>
