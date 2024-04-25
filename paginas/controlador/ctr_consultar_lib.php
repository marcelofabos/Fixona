<?php
include "../includes/cargar_clases.php";

$crudlibro = new CRUDLibro();

if (isset($_POST["id_lib"])) {
    $id_lib = $_POST["id_lib"];

    $crudlibro->ConsultarLibro($id_lib);
}
