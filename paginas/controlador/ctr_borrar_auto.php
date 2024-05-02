<?php
    include "../includes/cargar_clases.php";

    $crudautores = new CRUDAutores();

    if (isset($_GET["id_autores"])) {
        $id_autor = $_GET["id_autores"];

        $crudautores ->BorrarAutor($id_autor);

    header("location: ../vista/listar_autores.php");
}
