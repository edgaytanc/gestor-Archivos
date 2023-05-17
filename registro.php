<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
    <title>Registro</title>
</head>

<body>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h2 class="text-center">Registro de Usuario</h2>
                    </div>
                    <div class="card-body">
                        <form id="frmRegistro" method="POST" onsubmit="return agregarUsuarioNuevo()">
                            <label for="nombre">Nombre Personal</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                            <label for="fechaNacimiento">Fecha de nacimiento</label>
                            <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required>
                            <label for="correo">Email o correo</label>
                            <input type="email" name="correo" id="correo" class="form-control" required>
                            <label for="usuario">Nombre de Usuario</label>
                            <input type="text" name="usuario" id="usuario" class="form-control" required>
                            <label for="password">contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                            <br>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <button type="" class="btn btn-primary">Registrar</button>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a href="index.php" class="btn btn-success">Ingresar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <script src="librerias/jquery-3.7.0.min.js"></script>
    <script src="librerias/sweetalert.min.js"></script>
    <script type="text/javascript">
        function agregarUsuarioNuevo(){
            $.ajax({
                method: "POST",
                data: $('#frmRegistro').serialize(),
                url: "procesos/usuario/registro/agregarUsuario.php",
                success:function(respuesta){
                    respuesta = respuesta.trim();

                    console.log(respuesta);
                    
                    if(respuesta == 1){
                        $("#frmRegistro")[0].reset();
                        swal(":D","Agregado con exito!","success");
                    }
                    else if(respuesta == 2){
                        swal("Este usuario ya existe, por favor escribe otro !!");
                    }
                    else{
                        swal(":(","Fallo al agregar!","error");
                    }
                }
            });

            return false;
        }
    </script>
</body>
</html>