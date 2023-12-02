<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Alta de empleados</title>
    <link rel="stylesheet" href="../styles/createEmployee.css">
    <script src="../javaScript/jquery-3.3.1.min.js"></script>
    <script src="../javaScript/createEmployee.js"></script>
    <script>
        function valid(){
            var name = $('#entryName').val();
            var passw = $('#pass').val();
            var combox = $('#rol').val();
            var lastname = $("#entrylastName").val();
            var picture = $(".pictureEmpleyeeo").val();
            var email = $("#entryEmail").val();
            if(name == "" || passw =="" || combox == 0 || lastname=="" || email == "" || picture == ""){
                $('#incompleateData').show();
                $('#incompleateData').html('Faltan Campos por llenar');
                setTimeout("$('#incompleateData').hide(); $('#incompleateData').html('')",5000);
            }else{
                document.register.method = 'POST';
                document.register.action = '../BackEnd/newEmployee.php'
                document.register.valid();
            }
        }
    </script>

</head>
<body>
<div class="topnav">
    <a href="menu.php">Bienvenido</a>
    <a href="empleoyeesTable.php"> Tabla de empleados</a>
    <a href="createEmployee.php" class="active">Registro de empleados</a>
    <a href="exitSession.php" class="pull-right closeSesion">Cerrar Sesion</a>

</div>
<h1>Registro de empleado</h1>
<div class="conteiner">
    <div class="table">
        <form method="post" enctype="multipart/form-data" name="register" class="register" id="register">
            <div class="row">
                <div class="cell">
                    <input  class="inputs" type="text" name="name" id="name" placeholder="Nombre">
                </div>
            </div>

            <div class="row">
                <div class="cell">
                    <input class="inputs" type="text" id="lastname" name="lastname" placeholder="Apellido">
                </div>
            </div>
            <div class="row">
                <div class="cell">
                    <input onblur="emailverificationPHP();" class="inputs" type="text" id="email" name="email" placeholder="@gmail.com"
                </div>
                <div class="cell" id="cellEmail">
                    <div id="emailverfication" class="errormessageemail" ></div>
                </div>
            </div>

            <div class="row">
                <div class="cell">
                    <td class="cell"><input class="inputs"  type="text" name="pass" id="pass" placeholder="Pass">
                </div>
            </div>
            <div class="row">
                <div class="cell">
                    <select class="selects" name="rol" id="rol">
                        <option value="0">Selecciona</option>
                        <option value="1" >Gerente</option>
                        <option value="2">Ejecutivo</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="cell">
                    <input type="file"  class="pictureEmpleyeeo" name="picture" id="myfile" accept="image/*">
                </div>
            </div>
            <div class="row">
                <div class="cell">
                    <button  onclick="valid();  return false;" class="buttons">Enviar</button>
                </div>
            </div>
            <div class="row">
                <div class="cell">
                    <div class="errormessage" id="incompleateData"></div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>