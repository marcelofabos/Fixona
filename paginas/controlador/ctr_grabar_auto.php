<?php
include "../includes/cargar_clases.php";

$crudautores = new CRUDAutores();

if (isset($_POST["btn_registrar_auto"])) {
    $autor = new Autores();

    $autor->id_autor = $_POST["txt_id_autor"];
    $autor->nombre = $_POST["txt_nombre"];
    $autor->apellido = $_POST["txt_apellido"];
    $autor->nacionalidad = $_POST["txt_nacion"];

    $tipo = $_POST["txt_tipo"];

    if ($tipo == "r") {
        $crudautores->RegistrarAutor($autor);
    } else if ($tipo == "e") {
        $crudautores->EditarAutor($autor);
    }
    header("location: ../vista/listar_autores.php");
}

