<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Editar Producto";
include ("../includes/cabecera.php");
?>

<body style="background: #2980B9;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
    <?php
    include ("../includes/menu.php");
    include "../includes/cargar_clases.php";

    if (isset($_GET["id_editoriales"])) {
        $id_edito = $_GET["id_editoriales"];
        $crudeditorial = new CRUDEditoriales();
        $rs_edito = $crudeditorial->BuscarEditorial($id_edito);

    } else {
        header("location: listar_editoriales.php");
    }
    ?>
    <div class="container mt-3">
        <header>
            <h1 class="text-success"><i class="fas fa-pen-square"></i> Editar Editorial</h1>
            <hr />
        </header>

        <nav>
            <a href="listar_editoriales.php" class="btn btn-outline-primary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form id="frm_editar_edito.php" name="frm_editar_edito" method="post" action="../controlador/ctr_grabar_edito.php" autocomplete="off">
                                    <input type="hidden" id="txt_tipo" name="txt_tipo" value="e" />

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="txt_id_edito" class="form-label">Id</label>
                                            <input type="text" class="form-control" id="txt_id_edito" name="txt_id_edito"
                                                placeholder="Id" maxlength="5" readonly
                                                value="<?= $rs_edito->id_editorial ?>">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="txt_nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="txt_nombre" name="txt_nombre"
                                                placeholder="Descripcion" maxlength="100"
                                                value="<?= $rs_edito->nombre ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="txt_pais" class="form-label">Pais</label>
                                            <input type="text" class="form-control" id="txt_pais" name="txt_pais"
                                                placeholder="Descripcion" maxlength="100"
                                                value="<?= $rs_edito->pais ?>">
                                        </div>
                                    </div><br>            
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary"
                                                id="btn_registrar_edito" name="btn_registrar_edito">
                                                <i class="fas fa-save"></i> Actualizar Informacion
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>

        <?php
        include ("../includes/pie.php");
        ?>
    </div>
</body>

</html>