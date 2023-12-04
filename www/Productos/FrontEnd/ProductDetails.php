<?php
session_start();
$id = $_REQUEST['id'];
require "../BackEnd/conecta.php";
$con = conecta();
$sql = "SELECT * FROM Products WHERE status = 1 AND deleted = 0 AND id='$id'" ;
$res = $con->query($sql);
while($row = $res->fetch_array()) {
    $id = $row["id"];
    $productName = $row["product_name"];
    $productCode = $row["product_code"];
    $productDescription = $row["product_description"];
    $productCost = $row["product_cost"];
    $productStock = $row["product_stock"];
    $file = $row["archivo"];
}
?>

<html>
<head>
    <title>Detalles del Producto</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Styles/productDetails.css">
    <script src="../javaScript/jquery-3.3.1.min.js"></script>
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
                    <a class="nav-link " href="productTable.php">Tabla de productos</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="createProduct.php">Nuevo Producto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="ProductDetails.php">Detalles del Producto</a>
                    <span class="visually-hidden">(current)</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="exitSession.php">Cerrar Sesion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<br><br><br>
<h1>Detalle del Producto</h1>
<div class="conteiner">
    <div class="controllerConteiner">
        <div class="imageConteiner">
            <div><img class="imgs" src="<?php echo $file ?>"></div>
        </div>
        <div class="textConteiner">
            <div class="subTextConteiner">
                <div class="headerConteiner"><strong><p>Producto:</p></strong></div>
                <div class="bodyConteiner"><p><?php echo $productName?> </p></div>
            </div>
            <div class="subTextConteiner">
                <div class="headerConteiner">
                    <strong>
                        <p>
                            Codigo:
                        </p>
                    </strong>
                </div>
                <div class="bodyConteiner"><p><?php echo $productCode?> </p></div>
            </div>
            <div class="subTextConteiner">
                <div class="headerConteiner"> <strong> <p>Descripcion:</p></strong></div>
                <div class="bodyConteiner"><p><?php echo $productDescription?></p></div>
            </div>
            <div class="subTextConteiner">
                <div class="headerConteiner"> <strong> <p>Precio:</p></strong> </div>
                <div class="bodyConteiner"><p>$<?php echo $productCost?>.00</p></div>
            </div>
            <div class="subTextConteiner">
                <div class="headerConteiner"> <strong> <p>Disponibles:</p></strong></div>
                <div class="bodyConteiner"><p><?php echo $productStock?> unidades</p> </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


