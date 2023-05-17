<?php

    session_start();
    require_once "../../clases/Gestor.php";
    $Gestor = new Gestor();
    $idArchvio = $_POST['idArchivo'];
    $idUsuario = $_SESSION['idUsuario'];

    $nombreArchivo = $Gestor->obtenerNombreArchivo($idArchvio);

    $rutaEliminar = "../../archivos/".$idUsuario."/".$nombreArchivo;

    if (unlink($rutaEliminar)){
        echo $Gestor->eliminarRegistroArchivo($idArchvio);
    }else{
        echo 0;
    }
   
        
?>