<?php
include "../includes/cargar_clases.php";

$crudEditorial = new CRUDEditoriales();

if (isset($_POST["valor"])) {
    $valor = $_POST["valor"];

    $crudEditorial->FiltrarEditorial($valor);
}
