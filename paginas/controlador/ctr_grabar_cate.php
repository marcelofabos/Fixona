<?php
include "../includes/cargar_clases.php";

$crudcategoria = new CRUDCategoria();

if (isset($_POST["btn_registrar_cate"])) {
    $categoria = new Categoria();

    $categoria->id_categoria = $_POST["txt_id_categoria"];
    $categoria->nombre_categoria = $_POST["txt_nombre_categoria"];

    $tipo = $_POST["txt_tipo"];

    if ($tipo == "r") {
        $crudcategoria->RegistrarCategoria($categoria);
    } else if ($tipo == "e") {
        $crudcategoria->EditarCategoria($categoria);
    }
    header("location: ../vista/listar_libro.php");
}

