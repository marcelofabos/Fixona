<?php
include "../includes/cargar_clases.php";

$crudlibro = new CRUDLibro();

if (isset($_POST["btn_registrar_lib"])) {
    $libro = new Libro();

    $libro->id_libro = $_POST["txt_id_libro"];
    $libro->titulo = $_POST["txt_titulo"];
    $libro->autor = $_POST["cbo_autor"];
    $libro->editorial = $_POST["cbo_editorial"];
    $libro->categoria = $_POST["cbo_categoria"];
    $libro->precio = $_POST["txt_precio"];

    $tipo = $_POST["txt_tipo"];

    if ($tipo == "r") {
        $crudlibro->RegistrarLibro($libro);
    } else if ($tipo == "e") {
        $crudlibro->EditarLibro($libro);
    }
    header("location: ../vista/listar_libro.php");
}

