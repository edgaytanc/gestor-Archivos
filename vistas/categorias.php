<?php
session_start();
if (isset($_SESSION['usuario'])) {
    include "header.php";
?>

    <div class="bg-light p-5 rounded-lg m-3">
        <div class="container">
            <h1 class="display-4">Carpetas</h1>
            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregaCategoria">
                        <span class="fa-solid fa-circle-plus"></span> Agregar nueva Carpeta
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaCategorias"></div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalAgregaCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nueva carpeta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="frmCategorias">
                        <label for="">Nombre de la carpeta</label>
                        <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalActualizarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Carpeta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmActualizaCategoria">
                        <input type="text" id="idCategoria" name="idCategoria" hidden>
                        <label for="">Carpeta</label>
                        <input type="text" id="categoriaU" name="categoriaU" class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCerrarUpdateCategoria">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="btnActualizaCategoria">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "footer.php";
    ?>
    <script src="../js/categorias.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablaCategorias').load("categorias/tablaCategoria.php");

            $('#btnGuardarCategoria').click(function() {
                agregarCategoria();
            });
            $('#btnActualizaCategoria').click(function(){
                actualizaCategoria();
            });
        });
    </script>

<?php
} else {
    header("location:../index.php");
}
?>