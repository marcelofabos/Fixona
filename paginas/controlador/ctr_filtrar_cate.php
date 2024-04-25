<?php
include "../includes/cargar_clases.php";

$crudcategoria = new CRUDCategoria();

if (isset($_POST["valor"])) {

    $valor = $_POST["valor"];
    $crudcategoria->FiltrarCategoria($valor);
    
}
