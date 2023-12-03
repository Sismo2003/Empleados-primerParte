<?php
    session_start();
    require "../BackEnd/conecta.php";

    $id = $_REQUEST['id'];
    $con = conecta();
    $sql = "SELECT * FROM Products WHERE status = 1 AND deleted = 0 AND id = '$id'";
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


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edicion de perfil</title>
    <script src="../JavaScript/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../Styles/CreateProduct.css">
    <script src="../JavaScript/newProduct.js"></script>
    <link rel="stylesheet" href="../Styles/bootstrap.min.css">
    <script>
        function editValues(x) {
            var id = parseInt(x);
            var product = $('#productName').val();
            var code = $('#productCode').val();
            var descr = $('#productDescription').val();
            var cost = $("#productCost").val();
            var stock = $("#typeNumber").val();
            var file = $("#formFile").val();
            if (product == "" || code == "" || descr == "" || cost == "" ) {
                $('#incompleateData').show();
                $('#incompleateData').html('Faltan Campos por llenar');
                setTimeout("$('#incompleateData').hide(); $('#incompleateData').html('')", 5000);

            }
            else {
                if (file == '') {
                    $("#formFile").val('NULLVALUEFORPICTUREX456');
                }
                document.productForm.action='../BackEnd/editProductDetailsDataBase.php?id='+id;
                document.productForm.method="POST";
                document.productForm.valid();
            }
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
                        <a class="nav-link " href="productTable.php">Tabla de productos</a>


                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="createProduct.php">Nuevo Producto</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="editProductDetails.php">Editar Producto</a>
                        <span class="visually-hidden">(current)</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="exitSession.php">Cerrar Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="conteiner">
        <div class="subconteiner">
            <form id="productForm" name="productForm" enctype="multipart/form-data" method="post">
                <fieldset>
                    <legend>Editar Producto</legend>
                    <div class="form-group">
                        <fieldset disabled="">
                            <label class="form-label" for="disabledInput">ID del Producto</label>
                            <input class="form-control" name="id" id="disabledInput" type="text"  placeholder="<?php echo $id ?>  " disabled="">
                        </fieldset>
                    </div>

                    <div class="form-group">
                        <label for="productName" class="form-label mt-4" >Nombre del producto</label>
                        <input name="item" type="text" class="form-control" id="productName"  placeholder="Nombre del producto" value="<?php echo $productName ?>">
                    </div>
                    <div class="form-group">
                        <label for="productCode" class="form-label mt-4">Codigo del producto</label>
                        <input name="code" onblur="codeVerficationSecond('<?php echo $productCode ?>'); return false;" type="text" class="form-control" id="productCode" value="<?php echo $productCode ?>" placeholder="Codigo del producto">
                    </div>
                    <div class="alert alert-dismissible alert-primary" id="ExistingEmail">
                    </div>

                    <div class="form-group">
                        <label for="productDescription" class="form-label mt-4">Ingrese la descripcion del producto</label>
                        <textarea name="desc" class="form-control" id="productDescription" rows="1"><?php echo $productDescription ?></textarea>
                    </div>
                    <br>
                    <label>Costo del producto</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Costo</span>
                        <input name="price" type="text" class="form-control" id="productCost" value="<?php echo $productCost?>" aria-label="Costo del producto">
                        <span class="input-group-text">.00</span>
                    </div>


                    <div class="form-outline">
                        <label for="typeNumber" class="form-label mt-4">Productos Disponibles</label>
                        <input name="rol" type="number" id="typeNumber" class="form-control" value=<?php echo $productStock?> />
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label mt-4">Foto del Producto</label>
                        <input name="picture" class="form-control" type="file" id="formFile">
                    </div>
                    <br>

                    <div class="alert alert-dismissible alert-danger nofull"></div>

                    <button type="submit" onclick="editValues(<?php echo $id ?>  ); return false;" class="btn btn-primary">Submit</button>
                </fieldset>
            </form>
        </div>
    </div>
</body>

</html>