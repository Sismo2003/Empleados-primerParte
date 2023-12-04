<?php
session_start();
$id = $_REQUEST['id'];
require "../BackEnd/conecta.php";
$con = conecta();
$sql = "SELECT * FROM Offers WHERE status = 1 AND deleted = 0 AND id='$id'" ;
$res = $con->query($sql);
while($row = $res->fetch_array()) {
    $productName = $row["name"];
    $file = $row["archivo"];
}?>
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
                    <a class="nav-link" href="showOffers.php">Tabla de promociones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="newPromotion.php">Crear Promociones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="newPromotion.php">Detalles Promocion</a>
                    <span class="visually-hidden">(current)</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../Productos/FrontEnd/exitSession.php">Cerrar Sesion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="detailsConteiner">
    <div class="detailsSubConteiner">
        <div class="card mb-3">
            <h3 class="card-header"> <?php echo $productName?>  </h3>
            <img class="d-block user-select-none" width="100%" height="200" src="<?php echo $file?>"
            <ul class="list-group list-group-flush">
                <li class="list-group-item" style="text-align: center">Grand Promocion!</li>
            </ul>
            <div class="card-body">
                <a onclick="edit(<?php echo $id?>)" class="card-link">Editar</a>
                <a onclick="deleted(this,<?php echo $id ?>);return false;" class="card-link">Borrar</a>

            </div>
            <div class="card-footer text-muted">
                Oferta de ultimo Minuto!
            </div>
        </div>

    </div>
</div>


</body>

</html>