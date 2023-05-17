<?php

require_once "Conexion.php";

class Usuario extends Conectar{

    public function agregarUsuario($datos){
        $conexion = Conectar::conexion();

        if(self::buscarUsuarioRepetido($datos['usuario'])){
            return 2;
        }
        else{
            $sql = "INSERT INTO t_usuarios (nombre,fechaNacimiento,email,usuario,password) 
                        VALUES (?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssss', $datos['nombre'],
                                        $datos['fechaNacimiento'],
                                        $datos['correo'],
                                        $datos['usuario'],
                                        $datos['password']);
            $exito = $query->execute();
            $query->close();
            return $exito;
        }
        
    }

    public function buscarUsuarioRepetido($usuario){
        $conexion = Conectar::conexion();

        $sql = "SELECT usuario FROM t_usuarios WHERE usuario = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('s', $usuario);
        $query->execute();
        $result = $query->get_result();

        if($result->num_rows > 0){
            return 1;
        }
        else{
            return 0;
        }
        $query->close();
    }

    public function login($usuario,$password){
        $conexion = Conectar::conexion();

        $sql = "SELECT count(*) as existeUsuario FROM t_usuarios WHERE usuario = '$usuario' AND password = '$password'";
        $result = mysqli_query($conexion,$sql);

        $respuesta = mysqli_fetch_array($result)['existeUsuario'];

        if($respuesta > 0 ){
            $_SESSION['usuario'] = $usuario;

            $sql = "SELECT id_usuarios FROM t_usuarios WHERE usuario = '$usuario' AND password = '$password'";
            $result = mysqli_query($conexion,$sql);
            $idUsuario = mysqli_fetch_row($result)[0];

            $_SESSION['idUsuario']=$idUsuario;

            return 1;
        }
        else{
            return 0;
        }
    }
}
?>