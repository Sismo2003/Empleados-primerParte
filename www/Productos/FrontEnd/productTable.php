<?php session_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta lang="es">
        <title>Tabla de Productos</title>
        <link rel="stylesheet" href="../Styles/PruductTable.css">
        <script src="../JavaScript/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="../Styles/bootstrap.min.css">
        <script src="../JavaScript/product-Table.js"></script>
        <script>
            function deleteProduct(nodo,id){
                var confirmation = confirm("Seguro que deseas eliminar a este Producto?");
                if(confirmation){

                    $.ajax(
                        {
                            url:"../BackEnd/ProfileDeleteSQL.php",
                            type:"POST",
                            data:"id="+id,
                            success:function (res){
                                var where = nodo.parentNode;
                                var tr = where.parentNode;
                                $(tr).hide();
                            },
                            error:function (){
                                alert("ERROR");
                            }
                        }
                    )
                }
            }
            function seeDetails(id){
                window.location.href='productDetails.php?id='+id;
            }
        </script>
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
                        <a class="nav-link active" href="productTable.php">Tabla de productos</a>
                        <span class="visually-hidden">(current)</span>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="createProduct.php">Nuevo Producto</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="exitSession.php">Cerrar Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h1>PRODUCTOS</h1>
    <div class="main">
        <div class="conteiner">
            <table>
                <tr class="TableHeader">
                    <th class="th-products  cell">ID</th>
                    <th class="th-productsth-products  cell">Producto</th>
                    <th class="th-product   cell">Codigo</th>
                    <th class="th-products  cell">Descripcion</th>
                    <th class="th-products  cell">Precio</th>
                    <th class="th-products  cell">Disponibles</th>
                    <th class="th-products  cell">Foto</th>
                    <th class="th-products  cell">Editar</th>
                    <th class="th-products  cell">Detalle</th>
                    <th class="th-products  cell">Eliminar</th>
                </tr>
                <?php
                require "../BackEnd/conecta.php";
                $con = conecta();
                $sql = "SELECT * FROM Products
                                    WHERE status = 1 AND deleted = 0";
                $res = $con->query($sql);
                while($row = $res->fetch_array()) {
                    $id = $row["id"];
                    $productName = $row["product_name"];
                    $productCode = $row["product_code"];
                    $productDescription = $row["product_description"];
                    $productCost = $row["product_cost"];
                    $productStock = $row["product_stock"];
                    $file = $row["archivo"];
                    ?>
                    <tr>
                        <td class="cell"><?php echo $id ?></td>
                        <td class="cell"><?php echo $productName ?></td>
                        <td class="cell"><?php echo $productCode ?></td>
                        <td class="cell"><?php echo $productDescription ?></td>
                        <td class="cell">$<?php echo $productCost ?>.00</td>
                        <td class="cell"><?php echo $productStock ?></td>
                        <td class="cell"> <img src= <?php echo $file ?>></td>
                        <td class="buttons cell"><button type="submit" onclick="editProduct(<?php echo $id ?>)">Editar</button></td>
                        <td class="buttons cell"><button type="submit" onclick="seeDetails(<?php echo $id ?>)">Detalles</button></td>
                        <td class="buttons cell" ><button onclick="deleteProduct(this,<?php echo $id ?>);return false;">Eliminar</button></td>
                    </tr>
                <?php }?>
            </table>
        </div>
    </div>



    </body>
</html>
