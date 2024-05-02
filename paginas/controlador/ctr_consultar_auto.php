<?php
include "../includes/cargar_clases.php";

$crudautores = new CRUDAutores();

if (isset($_POST["id_auto"])) {
    $id_auto = $_POST["id_auto"];

    $crudautores->ConsultarAutor($id_auto);
}
