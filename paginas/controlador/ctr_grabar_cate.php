<?php
include "../includes/cargar_clases.php";

$crudcate = new CRUDCategoria();

if (isset($_POST["btn_registrar_cate"])) {
    $categoria = new Categoria(); //:id_libro, :titulo, :autor, :editorial, :categoria, :precio

    $categoria->id_cate= $_POST["txt_id_cate"];
    $categoria->categoria = $_POST["txt_categoria"];

    $tipo = $_POST["txt_tipo"];

    if ($tipo == "r") {
        $crudcate->RegistrarCategoria($categoria);
    } else if ($tipo == "e") {
        $crudcate->EditarCategoria($categoria);
    }
    header("location: ../vista/listar_categoria.php");
} 
