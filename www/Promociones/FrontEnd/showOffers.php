<?php session_start() ?>
<html>
    <head>
        <title>Offertas</title>
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="../Styles/bootstrap.min.css">
        <link rel="stylesheet" href="../Styles/offerStyles.css">
        <script src="../Js/main.js"></script>
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
                            <a class="nav-link active" href="showOffers.php">Tabla de promociones</a>
                            <span class="visually-hidden">(current)</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="newPromotion.php">Crear Promociones</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../../Productos/FrontEnd/exitSession.php">Cerrar Sesion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <h1>Promociones</h1>
        <div class="main">
            <div class="conteiner">
                <table>
                    <tr class="TableHeader">
                        <th class="th-products  cell">ID</th>
                        <th class="th-productsth-products  cell">Producto</th>
                        <th class="th-products  cell">Foto</th>
                        <th class="th-products  cell">Editar</th>
                        <th class="th-products  cell">Detalle</th>
                        <th class="th-products  cell">Eliminar</th>
                    </tr>
                    <?php
                    require "../BackEnd/conecta.php";
                    $con = conecta();
                    $sql = "SELECT * FROM Offers
                                    WHERE status = 1 AND deleted = 0";
                    $res = $con->query($sql);
                    while($row = $res->fetch_array()) {
                    $id = $row["id"];
                    $productName = $row["name"];
                    $file = $row["archivo"];
                    ?>
                    <tr>
                        <td class="cell"><?php echo $id?> </td>
                        <td class="cell"><?php echo $productName ?></td>
                        <td class="cell"><img class="tbImg" src="<?php echo $file?>"> </td>
                        <td class="buttons cell"><button type="submit" onclick="edit(<?php echo $id?>)">Editar</button></td>
                        <td class="buttons cell"><button type="submit" onclick="details(<?php echo $id ?>)">Detalles</button></td>
                        <td class="buttons cell" ><button onclick="deleted(this,<?php echo $id ?>);return false;">Eliminar</button></td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>



    </body>

</html>