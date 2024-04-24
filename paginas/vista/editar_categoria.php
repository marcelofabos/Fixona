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

    if (isset($_GET["id_cate"])) {
        $id_cate = $_GET["id_cate"];

        $crudcategoria = new CRUDCategoria();

        $rs_cate = $crudcategoria->MostrarCategoria($id_cate);


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
                                <form id="frm_editar_cate.php" name="frm_editar_cate" method="post"
                                    action="../controlador/ctr_grabar_cate.php" autocomplete="off">
                                    <input type="hidden" id="txt_tipo" name="txt_tipo" value="e" />

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="txt_cate" class="form-label">Id</label>
                                            <input type="text" class="form-control" id="txt_id_cate" name="txt_id_cate"
                                                placeholder="Id" maxlength="5" readonly
                                                value="<?= $rs_cate->id_categoria ?>">
                                        </div>

                                        <div class="col-md-6">
                                                <label for="cbo_cat" class="form-label">Categoria</label>
                                                <select class="form-select form-select-lg mb-3" id="cbo_cat" name="cbo_cat">
                                                    <option value="">[Seleccione categoria]</option>
                                                <?php
                                                    foreach($rs_cate as $cate){
                                                ?>
                                                    <option value="<?=$cate->nombre_categoria?>"></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>


                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary"
                                                id="btn_registrar_prod" name="btn_registrar_prod">
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
        include ("../includes/pie.php");
        ?>
    </div>
</body>

</html>