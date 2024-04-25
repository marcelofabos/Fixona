<?php
    include "../includes/cargar_clases.php";

    $crudventa = new CRUDVenta();

    if (isset($_GET["id_venta"])) {
        $id_venta = $_GET["id_venta"];

        $crudventa ->BorrarVenta($id_venta);

    header("location: ../vista/listar_venta.php");
}
