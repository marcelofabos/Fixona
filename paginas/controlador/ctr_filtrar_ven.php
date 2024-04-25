<?php
include "../includes/cargar_clases.php";

$crudventa = new CRUDVenta();

if (isset($_POST["valor"])) {
    $valor = $_POST["valor"];

    $crudventa->FiltrarVenta($valor);
}
