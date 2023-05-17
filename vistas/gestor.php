<?php
session_start();
if (isset($_SESSION['usuario'])) {

  include "header.php";
?>

  <div class="bg-light p-5 rounded-lg m-3">
    <h1 class="display-4">Gestor de Archivos</h1>
    <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarArchivos">
      <span class="fa-solid fa-circle-plus"></span> Agregar Archivos
    </span>
    <div id="tablaGestorArchivos"></div>
  </div>

  <!-----Modal para agregar archivos----->

  <!-- Modal -->
  <div class="modal fade" id="modalAgregarArchivos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="frmArchivos" enctype="multipart/form-data" method="POST">
            <label for="">Categoria</label>
            <div id="categoriasLoad"></div>
            <br>
            <label for="">Selecciona los archivos</label>
            <input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple="">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar Archivos</button>
        </div>
      </div>
    </div>
  </div>

  <!-------Modal para ver archivos------->


  <!-- Modal -->
  <div class="modal fade" id="visualizarArchivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Archivo</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="archivoObtenido"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>

        </div>
      </div>
    </div>
  </div>



  <?php include "footer.php"; ?>

  <script src="../js/gestor.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
      $('#categoriasLoad').load("categorias/selectCategorias.php");

      $('#btnGuardarArchivos').click(function() {
        agregarArchivosGestor();
      });
    });
  </script>
<?php
} else {
  header("location:../index.php");
}

?>