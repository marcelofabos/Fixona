<?php
include "../includes/cargar_clases.php";

$crudventa = new CRUDVenta();

if (isset($_POST["btn_registrar_ven"])) {
    $venta = new Venta();

    $venta->id_venta = $_POST["txt_id_venta"];
    $venta->id_libro = $_POST["txt_id_libro"];
    $venta->fecha_venta = $_POST["txt_fecha"];
    $venta->cantidad_vendida = $_POST["txt_cant_vend"];
    $venta->total = $_POST["txt_total"];

    $tipo = $_POST["txt_tipo"];

    if ($tipo == "r") {
        $crudventa->RegistrarVenta($venta);
    } else if ($tipo == "e") {
        $crudventa->EditarVenta($venta);
    }
    header("location: ../vista/listar_venta.php");
}

