<?php
include "../includes/cargar_clases.php";

$crudcategoria = new CRUDCategoria();

if (isset($_POST["id_cate"])) {
    $id_cate = $_POST["id_cate"];

    $crudcategoria->ConsultarCategoria($id_cate);
}
