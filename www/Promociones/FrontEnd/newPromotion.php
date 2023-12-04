<?php session_start() ?>
<html>
    <head>
        <title>Crea Un Promocion</title>
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="../Styles/bootstrap.min.css">
        <link rel="stylesheet" href="../Styles/offerStyles.css">
        <script>
            function createNewPromotion(){
                var product = $("#Product-Entry").val();
                var filePath = $('#formFile').val();
                if(product == "" || filePath  == ""){
                    $('#nofull').show();
                    $('#nofull').html('Faltan Campos por llenar');
                    setTimeout("$('#nofull').hide(); $('#nofull').html('')", 5000);
                }
                else{
                    document.newPromotionForm.action='../BackEnd/uploadPromotionDB.php';
                    document.newPromotionForm.method='POST';
                    document.newPromotionForm.submit();
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
                        <a class="nav-link " href="showOffers.php">Tabla de promociones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="newPromotion.php">Crear Promociones</a>
                        <span class="visually-hidden">(current)</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../Productos/FrontEnd/exitSession.php">Cerrar Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="formConteiner">
        <div class="formSubConteiner">
            <div class="box">
                <form name="newPromotionForm" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend style="text-align: center">Nueva Promocion</legend>
                        <div class="form-group">
                            <label for="Product-Entry" class="form-label mt-4">Nombre del Producto</label>
                            <input name="PromotionName" type="text" class="form-control" id="Product-Entry" aria-describedby="Name-Of-Product" placeholder="Producto en Promocion">
                            <small id="Small-Text-Product" class="form-text text-muted">Diguite el producto en promocion</small>
                        </div>
                        <div class="form-group">
                            <label for="formFile" class="form-label mt-4">Foto del producto</label>
                            <input class="form-control" type="file" id="formFile" name="picture">
                        </div>
                        <div class="alert alert-dismissible alert-danger nofull" id="nofull"></div>

                        <div class="form-group bottonConteiner">
                            <button type="button" onclick="createNewPromotion();" class="btn btn-primary submitButton">Enviar</button>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>

</html>