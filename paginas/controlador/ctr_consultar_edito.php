<?php
include "../includes/cargar_clases.php";

$crudEditorial = new CRUDEditoriales();

if (isset($_POST["id_edito"])) {
    $id_edito = $_POST["id_edito"];

    $crudEditorial->ConsultarEditorial($id_edito);
}
