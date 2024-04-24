<?php
    include "../includes/cargar_clases.php";

    $crudlibro = new CRUDLibro();

    if (isset($_GET["id_lib"])) {
        $id_lib = $_GET["id_lib"];

        $crudlibro->BorrarLibro($id_lib);

    header("location: ../vista/listar_libro.php");
}
