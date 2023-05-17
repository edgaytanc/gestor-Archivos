<?php

    session_start();
    require_once "../../clases/Gestor.php";
    $Gestor = new Gestor();
    $idArchvio = $_POST['idArchivo'];
    
    echo $Gestor->obtenerRutaArchivo($idArchvio);
   
        
?>