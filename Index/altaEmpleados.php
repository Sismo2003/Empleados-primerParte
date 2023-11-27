<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta de empleados</title>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="programacion.js"></script>
        <link rel="stylesheet" href="styles/altaempleados.css">
    </head>

    <body>
        <div class="topnav">
            <a href="tableempleoyees.php">Tabla de empleados</a>
            <a class="active" href="#">Registro de empleados</a>
        </div>
        <h1>Registro de empleado</h1>
        <div class="conteiner">
            <table class="tab">
                <form name="form1" id="Form1" method="post" action="altaEmpleados.php" >
                    <tr class="row">
                        <td class="cell"> <input  class="inputs" type="text" name="entryName" id="entryName" placeholder="Nombre"> </td>
                    </tr>
                    <tr class="row">
                        <td class="cell"><input class="inputs" type="text" id="entrylastName" name="entrylastName" placeholder="Apellido"></td>
                    </tr>
                    <tr class="row">
                        <td class="cell"><input onblur="emailverificationPHP();" class="inputs" type="email" id="entryEmail" name="entryEmail" placeholder="@gmail.com"></td>
                        <td class="cell" id="cellEmail" ><div id="emailverfication" class="errormessageemail" ></div></td>
                    </tr>
                    <tr class="row">
                        <td class="cell"><input class="inputs"  type="text" name="pass" id="pass" placeholder="Pass"></td>
                    </tr>
                    <tr class="row">
                        <td class="cell">
                            <select class="selects" name="rol" id="rol">
                                <option value="0">Selecciona</option>
                                <option value="1" >Gerente</option>
                                <option value="2">Ejecutivo</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="row">
                        <td class="cell"><button class="buttons" type="submit" onclick="valid();return false;">ENVIAR</button></td>

                    </tr>
                    <tr class="row">
                        <td class="cell"><div class="errormessage" id="incompleateData"></div></td>
                    </tr>

            </table>
        </div>
    </body>


</html>