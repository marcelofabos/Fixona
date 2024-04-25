<?php
include "../includes/cargar_clases.php";

$crudventa = new CRUDVenta();

if (isset($_POST["id_venta"])) {
    $id_venta = $_POST["id_venta"];

    $crudventa->ConsultarVenta($id_venta);
}
