<?php
include "../includes/cargar_clases.php";

$crudautores = new CRUDAutores();

if (isset($_POST["valor"])) {
    $valor = $_POST["valor"];

    $crudautores->FiltrarAutor($valor);
}
