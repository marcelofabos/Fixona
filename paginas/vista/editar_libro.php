<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Editar Producto";
include("../includes/cabecera.php");
?>

<body style="background: #2980B9;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
    <?php
    include("../includes/menu.php");
    include "../includes/cargar_clases.php";

    if (isset($_GET["id_lib"])) {
        $id_lib = $_GET["id_lib"];

        $crudlibro = new CRUDLibro();

        $rs_lib = $crudlibro->BuscarLibro($id_lib);

        if (!empty($rs_lib)) {
            $crudeditoriales = new CRUDEditoriales();
            $crudcategoria = new CRUDCategoria();

            $rs_edito = $crudeditoriales->ListarEditoriales();
            $rs_cat = $crudcategoria->ListarCategoria();
        } else {
            header("location: listar_producto.php");
        }
    } else {
        header("location: listar_producto.php");
    }
    ?>
    <div class="container mt-3">
        <header>
            <h1 class="text-success"><i class="fas fa-pen-square"></i> Editar Producto</h1>
            <hr />
        </header>

        <nav>
            <a href="listar_libro.php" class="btn btn-outline-primary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form id="frm_editar_prod.php" name="frm_editar_prod" method="post" action="../controlador/ctr_grabar_prod.php" autocomplete="off">
                                    <input type="hidden" id="txt_tipo" name="txt_tipo" value="e" />

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="txt_codprod" class="form-label">Id</label>
                                            <input type="text" class="form-control" id="txt_codprod" name="txt_codprod" placeholder="Id" maxlength="5" readonly value="<?= $rs_lib->id_libro ?>">
                                        </div>

                                        <div class="col-md-8">
                                            <label for="txt_prod" class="form-label">Titulo</label>
                                            <input type="text" class="form-control" id="txt_prod" name="txt_prod" placeholder="Titulo" maxlength="40" value="<?= $rs_lib->titulo ?>" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="txt_stk" class="form-label">Autor</label>
                                            <input type="text" class="form-control" id="txt_stk" name="txt_stk" placeholder="Autor" maxlength="4" min="1" max="9999" value="<?= $rs_lib->autor ?>" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="txt_cst" class="form-label">Nacionalidad</label>
                                            <input type="text" class="form-control" id="txt_cst" name="txt_cst" placeholder="Nacionalidad" maxlength="8" value="<?= $rs_lib->nacionalidad ?>" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="txt_gnc" class="form-label">Precio</label>
                                            <input type="text" class="form-control" id="txt_gnc" name="txt_gnc" placeholder="Precio" min="1" max="100" step="0.01" value="<?= $rs_lib->precio ?>" />
                                        </div>

                                        <div class="col-md-6">
                                            <label for="cbo_mar" class="form-label">Marca</label>
                                            <select class="form-select form-select-lg mb-3" id="cbo_mar" name="cbo_mar">
                                                <option value="">[Seleccione Editorial]</option>
                                                <?php
                                                foreach ($rs_edito as $edito) {
                                                    $selected = ($edito->id_editorial == $rs_prod->editorial) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $edito->id_editorial ?>" <?= $selected ?>><?= $edito->nombre ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="cbo_cat" class="form-label">Categoria</label>
                                            <select class="form-select form-select-lg mb-3" id="cbo_cat" name="cbo_cat">
                                                <option value="">[Seleccione categoria]</option>
                                                <?php
                                                foreach ($rs_cat as $cat) {
                                                    $selected = ($cat->id_categoria == $rs_prod->nombre_categoria) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $cat->id_categoria ?>" <?= $selected ?>><?= $cat->nombre_categoria ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>


                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary" id="btn_registrar_prod" name="btn_registrar_prod">
                                                <i class="fas fa-save"></i> Actualizar Informacion
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>

        <?php
        include("../includes/pie.php");
        ?>
    </div>
</body>

</html>