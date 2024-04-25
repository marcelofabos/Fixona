<?php
include "../includes/cargar_clases.php";

$crudlibro = new CRUDLibro();

if (isset($_POST["valor"])) {
    $valor = $_POST["valor"];

    $crudlibro->FiltrarLibro($valor);
}
