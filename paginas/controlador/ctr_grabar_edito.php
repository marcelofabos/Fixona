<?php
include "../includes/cargar_clases.php";

$crudventa = new CRUDEditoriales();

if (isset($_POST["btn_registrar_edito"])) {
    $venta = new Editoriales();

    $venta->id_editorial = $_POST["txt_id_edito"];
    $venta->nombre = $_POST["txt_nombre"];
    $venta->pais = $_POST["txt_pais"];

    $tipo = $_POST["txt_tipo"];

    if ($tipo == "r") {
        $crudventa->RegistrarEditorial($venta);
    } else if ($tipo == "e") {
        $crudventa->EditarEditorial($venta);
    }
    header("location: ../vista/listar_editoriales.php");
}

