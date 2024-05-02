<?php
    include "../includes/cargar_clases.php";

    $crudeditorial = new CRUDEditoriales();

    if (isset($_GET["id_editoriales"])) {
        $id_editorial = $_GET["id_editoriales"];

        $crudeditorial ->BorrarEditorial($id_editorial);

    header("location: ../vista/listar_editoriales.php");
}
