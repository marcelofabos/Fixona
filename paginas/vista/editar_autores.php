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

    if (isset($_GET["id_autores"])) {
        $id_autor = $_GET["id_autores"];
        $crudautores = new CRUDAutores();
        $rs_autor = $crudautores->BuscarAutor($id_autor);

    } else {
        header("location: listar_autores.php");
    }
    ?>
    <div class="container mt-3">
        <header>
            <h1 class="text-success"><i class="fas fa-pen-square"></i> Editar Autores</h1>
            <hr />
        </header>

        <nav>
            <a href="listar_autores.php" class="btn btn-outline-primary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form id="frm_editar_auto.php" name="frm_editar_auto" method="post" action="../controlador/ctr_grabar_auto.php" autocomplete="off">
                                    <input type="hidden" id="txt_tipo" name="txt_tipo" value="e" />

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="txt_id_autor" class="form-label">Id</label>
                                            <input type="text" class="form-control" id="txt_id_autor" name="txt_id_autor"
                                                placeholder="Id" maxlength="5" readonly
                                                value="<?= $rs_autor->id_autor ?>">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="txt_nombre" class="form-label">Nombres</label>
                                            <input type="text" class="form-control" id="txt_nombre" name="txt_nombre"
                                                placeholder="Descripcion" maxlength="100"
                                                value="<?= $rs_autor->nombre ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="txt_apellido" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" id="txt_apellido" name="txt_apellido"
                                                placeholder="Descripcion" maxlength="100"
                                                value="<?= $rs_autor->apellido ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="txt_nacion" class="form-label">Nacionalidad</label>
                                            <input type="text" class="form-control" id="txt_nacion" name="txt_nacion"
                                                placeholder="Descripcion" maxlength="100"
                                                value="<?= $rs_autor->nacionalidad ?>">
                                        </div>
                                    </div><br>            
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary"
                                                id="btn_registrar_auto" name="btn_registrar_auto">
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