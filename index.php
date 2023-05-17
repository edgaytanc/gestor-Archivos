<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
    <title>login</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="img/logo.png" id="icon" alt="User Icon" />
                <h1>Gestor de Archivos</h1>
            </div>

            <!-- Login Form -->
            <form method="POST" id="frmLogin" onsubmit="return logear()">
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="usuario" required>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="contraseña" required>
                <input type="submit" class="fadeIn fourth" value="Ingresar">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="registro.php">Registrar</a>
            </div>

        </div>
    </div>
    <script src="librerias/jquery-3.7.0.min.js"></script>
    <script src="librerias/sweetalert.min.js"></script>
    <script type="text/javascript">
        function logear(){
            $.ajax({
                type: "POST",
                data:$('#frmLogin').serialize(),
                url:"procesos/usuario/login/login.php",
                success:function(respuesta){
                    //alert(respuesta);
                    respuesta = respuesta.trim();
                    if(respuesta ==1){
                        window.location = "vistas/inicio.php";
                    }
                    else{
                        swal(":(", "Fallo al entrar!","error");
                    }
                }
            });
            return false;
        }
    </script>
</body>

</html>