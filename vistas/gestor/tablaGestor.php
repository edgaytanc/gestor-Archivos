<?php
session_start();
require_once "../../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();
$idUsuario = $_SESSION['idUsuario'];
$sql = "SELECT 
            archivos.id_archivo as idArchivo,
            usuarios.nombre as nombreUsuario,
            categorias.nombre as categoria,
            archivos.nombre as nombreArchivo,
            archivos.tipo as tipoArchivo,
            archivos.ruta as rutaArchivo,
            archivos.fecha as fecha
        FROM
            t_archivos AS archivos
                INNER JOIN
            t_usuarios AS usuarios ON archivos.id_usuario = usuarios.id_usuarios
                INNER JOIN
            t_categorias AS categorias ON archivos.id_categoria = categorias.id_categoria
        WHERE
            archivos.id_usuario='$idUsuario'";
$result = mysqli_query($conexion, $sql);
?>
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="tablaGestorDataTable">
                <thead>
                    <tr>
                        <th>Carpetas</th>
                        <th>Nombre</th>
                        <th>Extensión de archivo</th>
                        <th>Descargar</th>
                        <th>Visualizar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    /*
                            Arreglo de extensiones validas
                        */
                    $extensionesValidas = array('png', 'jpg', 'pdf', 'mp3', 'mp4');

                    while ($mostrar = mysqli_fetch_array($result)) {
                        $rutaDescarga = "../../archivos/" . $idUsuario . "/" . $mostrar['nombreArchivo'];
                        $nombreArchivo = $mostrar['nombreArchivo'];
                        $idArchivo = $mostrar['idArchivo'];
                    ?>
                        <tr>
                            <td><?php echo $mostrar['categoria']; ?></td>
                            <td><?php echo $mostrar['nombreArchivo']; ?></td>
                            <td><?php echo $mostrar['tipoArchivo']; ?></td>
                            <td>
                                <a href="<?php echo $rutaDescarga; ?>" download="<?php $nombreArchivo; ?>" class="btn btn-success btn-sm"><span class="fa-solid fa-download"></span></a>
                            </td>
                            <td>
                                <?php
                                for ($i = 0; $i < count($extensionesValidas); $i++) {
                                    if ($extensionesValidas[$i] == $mostrar['tipoArchivo']) {
                                ?>
                                        <span class="btn btn-primary btn-sm" 
                                              data-bs-toggle="modal" 
                                              data-bs-target="#visualizarArchivo" 
                                              onclick=" obtenerArchivoPorId('<?php echo $idArchivo ?>')">
                                            <span class="fa-solid fa-eye"></span>
                                        </span>
                                <?php
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <span class="btn btn-danger btn-sm" onclick="eliminarArchivo('<?php echo $idArchivo; ?>')">
                                    <sapn class="fa-solid fa-trash">
                                </span>
                                </span>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tablaGestorDataTable').DataTable();
    });
</script>