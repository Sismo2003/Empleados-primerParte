<?php session_start()?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear Producto</title>
        <link rel="stylesheet" href="../Styles/bootstrap.min.css">
        <link rel="stylesheet" href="../Styles/CreateProduct.css">
        <script src="../JavaScript/jquery-3.3.1.min.js"></script>
        <script src="../JavaScript/newProduct.js"></script>
        <script>
            function SendValue(){
                var product = $('#productName').val();
                var code = $('#productCode').val();
                var descr = $('#productDescription').val();
                var cost = $("#productCost").val();
                var stock = $("#productavaliable").val();
                var file = $("#formFile").val();


               if (product != "" || code != "" || descr != "" || cost != "" || file != "") {
                   document.productForm.action='../BackEnd/newProduct.php';
                   document.productForm.method="POST";
                   document.productForm.submit();

               }else {
                   $('#nofull').show();
                   $('#nofull').html('Faltan Campos por llenar');
                   setTimeout("$('#nofull').hide(); $('#nofull').html('')", 5000);
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
                            <a class="nav-link" href="productTable.php">Tabla de productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="createProduct.php">Nuevo Producto</a>
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
                        <legend>Nuevo Producto</legend>

                        <div class="form-group">
                            <label for="productName" class="form-label mt-4" >Nombre del producto</label>
                            <input name="item" type="text" class="form-control" id="productName"  placeholder="Nombre del producto">
                        </div>
                        <div class="form-group">
                            <label for="productCode" class="form-label mt-4">Codigo del producto</label>
                            <input name="code" onblur="codeVerfication();" type="text" class="form-control" id="productCode"  placeholder="Codigo del producto">
                        </div>
                        <div class="alert alert-dismissible alert-primary" id="ExistingEmail">
                        </div>

                        <div class="form-group">
                            <label for="productDescription" class="form-label mt-4">Ingrese la descripcion del producto</label>
                            <textarea name="desc" class="form-control" id="productDescription" rows="3"></textarea>
                        </div>
                        <br>
                        <label>Costo del producto</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Costo</span>
                            <input name="price" type="text" class="form-control" id="productCost" aria-label="Costo del producto">
                            <span class="input-group-text">.00</span>
                        </div>

                        <div class="form-group">
                            <label for="productavaliable" class="form-label mt-4">Productos Disponibles</label>
                            <select   name="rol" class="form-select" id="productavaliable">
                                <?php for($i = 0 ; $i != 101 ; $i++){ ?>
                                    <option> <?php echo $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formFile" class="form-label mt-4">Foto del Producto</label>
                            <input name="picture" class="form-control" type="file" id="formFile">
                        </div>
                        <br>

                        <div class="alert alert-dismissible alert-danger nofull" id="nofull"></div>

                        <button type="submit" onclick="SendValue(); return false;" class="btn btn-primary">Submit</button>

                    </fieldset>
                </form>
            </div>
        </div>


    </body>
</html>