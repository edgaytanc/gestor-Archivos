<?php
session_start();

require_once "../../clases/Conexion.php";

$idUsuario = $_SESSION['idUsuario'];
$conexion = new Conectar();
$conexion = $conexion->conexion();
?>


<div class="table-responsive">
    <table class="table table-striped table-hover" id="tablaCategoriasDataTable">
        <thead>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT id_categoria,nombre,fechaInsert FROM t_categorias WHERE id_usuario = '$idUsuario'";
            $result = mysqli_query($conexion, $sql);

            while ($mostrar = mysqli_fetch_array($result)) {
                $idCategoria = $mostrar['id_categoria'];
            ?>
                <tr>
                    <td><?php echo $mostrar['nombre']; ?></td>
                    <td><?php echo $mostrar['fechaInsert']; ?></td>
                    <td>
                        <span class="btn btn-warning btn-sm" onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')"
                        data-bs-toggle="modal" data-bs-target="#modalActualizarCategoria">
                            <span class="fa-solid fa-pen-to-square"></span>
                        </span>
                    </td>
                    <td>
                        <span class="btn btn-danger btn-sm" onclick="eliminarCategorias('<?php echo $idCategoria ?>')">
                            <span class="fa-solid fa-trash"></span>
                        </span>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tablaCategoriasDataTable').DataTable();
    });
</script>