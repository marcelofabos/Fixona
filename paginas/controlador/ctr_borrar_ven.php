<?php
    include "../includes/cargar_clases.php";

    $crudventa = new CRUDVenta();

    if (isset($_GET["id_ven"])) {
        $id_venta = $_GET["id_ven"];

        $crudventa ->BorrarVenta($id_venta);

    header("location: ../vista/listar_venta.php");
}
