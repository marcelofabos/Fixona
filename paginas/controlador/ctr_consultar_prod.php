<?php
include "../includes/cargar_clases.php";

$crudproducto = new CRUDProducto();

if (isset($_POST["codprod"])) {
    $codprod = $_POST["codprod"];

    $crudproducto->ConsultarProductoPorCodigo($codprod);
}
