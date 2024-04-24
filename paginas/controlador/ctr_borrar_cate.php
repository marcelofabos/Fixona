<?php
    include "../includes/cargar_clases.php";

    $crudcategoria = new CRUDCategoria();

    if (isset($_GET["id_cate"])) {
        $id_cate = $_GET["id_cate"];

        $crudcategoria->BorrarCategoria($id_cate);

    header("location: ../vista/listar_categoria.php");
}
