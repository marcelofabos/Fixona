<?php
include "../includes/cargar_clases.php";

$crudventa = new CRUDVenta();

if (isset($_POST["btn_registrar_ven"])) {
    $venta = new Venta();

    $venta->id_venta = $_POST["txt_codprod"];
    $venta->id_libro = $_POST["txt_prod"];
    $venta->titulo = $_POST["txt_stk"];
    $venta->fecha_venta = $_POST["txt_cst"];
    $venta->cantidad_vendida = $_POST["txt_gnc"];
    $venta->total = $_POST["cbo_mar"];

    $tipo = $_POST["txt_tipo"];

    if ($tipo == "r") {
        $crudventa->RegistrarVenta($venta);
    } else if ($tipo == "e") {
        $crudventa->EditarVenta($venta);
    }
    header("location: ../vista/listar_venta.php");
}

