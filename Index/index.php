<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="programacion.js"></script>
        <link rel="stylesheet" href="styles/login.css">
    </head>

    <body>
        <div class="topnav">
            <a href="index.php" class="active">LOGIN</a>
        </div>
        <div class="conteiner">
                <table class="tab">
                    <tr>
                        <td class="cell"><h1>LOGIN</h1></td>
                    </tr>
                    <tr class="row">
                        <td class="cell"><input class="inputs" type="email" name="name" id="entryName" autocomplete="off" placeholder="Correo"></td>
                    </tr>
                    <tr  class="row">
                        <td class="cell">
                            <input  class="inputs" type="password" name="pass" id="pass" autocomplete="off"  placeholder="Contraseña">
                        </td>
                    </tr>
                    <tr class="row">
                        <td class="cell">
                            <input class="buttons" type="submit" onclick="loginIn();return false;" value="Enviar"/>
                        </td>
                    </tr>
                    <tr class="row">
                        <td class="cell">
                            <div class="errormessage"></div>
                        </td>
                    </tr>
                </table>
        </div>
    </body>


</html>
