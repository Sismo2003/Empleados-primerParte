<?php
require "../BackEnd/conecta.php";
$con = conecta();
$id = $_REQUEST['id'];
$sql = "SELECT * FROM empleado WHERE status = 1 AND eliminado = 0 AND id = $id";
$res = $con->query($sql);

while($row = $res->fetch_array()) {
    $id = $row["id"];
    $nombre = $row["nombre"];
    $apellido = $row["apellido"];
    $stats = $row['status'];
    $correo = $row["correo"];
    $rol = $row["rol"];
    if($rol == 1) $explirol = 'Gerente';
    else $explirol = 'Ejecutivo';
    if($stats == 1) $status = 'ACTIVO';
    else $status = 'INACTIVO';

}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edicion de perfil</title>
        <script src="../javaScript/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="../styles/editProfileDetails.css">
        <script src="../javaScript/editProfileDetails.js"></script>
        <script>
            function editvalid(x){
                var id = parseInt(x);
                var name = $('#entryName').val();
                var passw = $('#pass').val();
                var combox = $('#rol').val();
                var lastname = $("#entryLastName").val();
                var email = $("#entryEmail").val();
                var file = $("#picture").val();
                if(name == ""  || combox == 0 || lastname=="" || email == ""){
                    $('#incompleateData').show();
                    $('#incompleateData').html('Faltan Campos por llenar');
                    setTimeout("$('#incompleateData').hide(); $('#incompleateData').html('')",5000);

                }else{

/*
                    if(file == ""){
                        $("#picture").val('NULLVALUEFORPICTUREX456');
                    }

                    if(passw == ""){
                        $('#pass').val('NULLFLAGXF2A0DC036');
                    }

 */
                    document.form1.action='../BackEnd/editProfileDetailsDataBase.php?id='+id;
                    document.form1.method='post';
                    document.form1.submit();
                }

            }
        </script>

    </head>

    <body>
        <div class="topnav">
            <a href="menu.php">Bienvenido</a>
            <a href="empleoyeesTable.php"> Tabla de empleados</a>
            <a class="active" href="">Edicion de empleados</a>
            <a href="exitSession.php" class="pull-right closeSesion">Cerrar Sesion</a>
        </div>
        <h1>Edicion de empleado</h1>
        <div class="conteiner">
            <div class="subconteiner">

                <form name="form1" id="form1" method="post"   enctype="multipart/form-data">
                    <div class="tab">
                        <div class="row noId" style="display: none">
                            <div class="cell"> <input  class="inputs" type="text" name="id" id="id" placeholder="id" value="<?php echo $id?>" >  </div>
                        </div>
                        <div class="row">
                            <div class="cell"> <input  class="inputs" type="text" name="entryName" id="entryName" placeholder="Nombre" value="<?php echo $nombre?>" >  </div>
                        </div>
                        <div class="row">
                            <div class="cell"><input class="inputs" type="text" id="entryLastName" name="entryLastName" placeholder="Apellido" value="<?php echo $apellido?>"></div>
                        </div>
                        <div class="row">
                            <div class="cell">
                                <input class="inputs" id="entryEmail" name="entryEmail" placeholder="@gmail.com" value="<?php echo $correo;?>" onblur="emailVerification('<?php echo $correo;?>')">
                            </div>
                            <div class="cell" id="cellEmail"><div id="emailverfication" class="errormessageemail" ></div></div>
                        </div>
                        <div class="row">
                            <div class="cell"><input class="inputs pass"  type="text" name="pass" id="pass" placeholder="Password" ></div>
                        </div>

                        <div class="row" style="margin: -1">
                            <div class="cell">
                                <select class="selects" name="rol" id="rol" >
                                    <option value="0" <?php echo ($rol == '0') ? 'selected' : ''; ?>>Selecciona</option>
                                    <option value="1" <?php echo ($rol == '1') ? 'selected' : ''; ?>>Gerente</option>
                                    <option value="2" <?php echo ($rol == '2') ? 'selected' : ''; ?>>Ejecutivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin: -1">
                            <div class="fileConteiner " data-text="Select your file!" >
                                <input class="inputs EntryFile"  type="file" name="picture" id="picture" >
                                <label class="labelPicture" for="picture"> <img src="../file.png" width="17px" height="17px"> Subir Imagen</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="cell"><button class="buttons" type="submit" onclick="editvalid(<?php echo $id?>);return false;">ENVIAR</button></div>
                        </div>
                        <div class="row">
                            <div class="cell"><div class="errormessage" id="incompleateData"></div></div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </body>

</html>