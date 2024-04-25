<?php
include "../includes/cargar_clases.php";

$crudlibro = new CRUDLibro();

if (isset($_POST["btn_registrar_libro"])) {
    $libro = new Libro(); //:id_libro, :titulo, :autor, :editorial, :categoria, :precio

    $libro->id_libro= $_POST["txt_id_libro"];
    $libro->titulo = $_POST["txt_titulo"];
    $libro->autor = $_POST["txt_autor"];
    $libro->editorial = $_POST["txt_editorial"];
    $libro->categoria = $_POST["txt_categoria"];
    $libro->precio = $_POST["txt_precio"];

    $tipo = $_POST["txt_tipo"];

    if ($tipo == "r") {
        $crudlibro->RegistrarLibro($libro);
    } else if ($tipo == "e") {
        //$crudcalibro->EditarCategoria($producto);
    }
    header("location: ../vista/listar_libro.php");
} 
