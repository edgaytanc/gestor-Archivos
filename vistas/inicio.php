<?php
session_start();
if (isset($_SESSION['usuario'])) {
    include "header.php";
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                    <div class="container-fluid py-5">
                        <h1 class="display-5 fw-bold">Gestor de Archivos</h1>
                        <p class="col-md-8 fs-4">Gestione sus archivos desde la web, cree carpetas y suba sus archivos y acceda a ellos desde cualquier lugar.</p>
                        <img src="../img/docs.png" alt="..." width="50%">
                        <!-- <button class="btn btn-primary btn-lg" type="button">Example button</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include "footer.php";
} else {
    header("location:../index.php");
}
?>