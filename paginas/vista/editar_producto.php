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

    if (isset($_GET["codprod"])) {
        $codprod = $_GET["codprod"];

        $crudproducto = new CRUDProducto();

        $rs_prod = $crudproducto->BuscarProductoPorCodigo($codprod);

        if (!empty($rs_prod)) {
            $crudmarca = new CRUDMarca();
            $crudcategoria = new CRUDCategoria();

            $rs_mar = $crudmarca->ListarMarca();
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
            <a href="listar_producto.php" class="btn btn-outline-primary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form id="frm_editar_prod.php" name="frm_editar_prod" method="post"
                                    action="../controlador/ctr_grabar_prod.php" autocomplete="off">
                                    <input type="hidden" id="txt_tipo" name="txt_tipo" value="e" />

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="txt_codprod" class="form-label">Código</label>
                                            <input type="text" class="form-control" id="txt_codprod" name="txt_codprod"
                                                placeholder="Código" maxlength="5" readonly
                                                value="<?= $rs_prod->codigo_producto ?>">
                                        </div>

                                        <div class="col-md-8">
                                            <label for="txt_prod" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="txt_prod" name="txt_prod"
                                                placeholder="Nombre del producto" maxlength="40"
                                                value="<?= $rs_prod->producto ?>" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="txt_stk" class="form-label">Stock disponible</label>
                                            <input type="number" class="form-control" id="txt_stk" name="txt_stk"
                                                placeholder="Stock" maxlength="4" min="1" max="9999"
                                                value="<?= $rs_prod->stock_disponible ?>" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="txt_cst" class="form-label">Costo</label>
                                            <input type="text" class="form-control" id="txt_cst" name="txt_cst"
                                                placeholder="Costo" maxlength="8" value="<?= $rs_prod->costo ?>" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="txt_gnc" class="form-label">% Ganancia</label>
                                            <input type="text" class="form-control" id="txt_gnc" name="txt_gnc"
                                                placeholder="Ganancia" min="1" max="100" step="0.01"
                                                value="<?= $rs_prod->ganancia * 100 ?>" />
                                        </div>

                                        <div class="col-md-6">
                                                <label for="cbo_mar" class="form-label">Marca</label>
                                                <select class="form-select form-select-lg mb-3" id="cbo_mar" name="cbo_mar">
                                                    <option value="">[Seleccione marca]</option>
                                                <?php
                                                    foreach($rs_mar as $mar){
                                                    $selected = ($mar->codigo_marca == $rs_prod->producto_codigo_marca) ? 'selected' : '';   
                                                ?>
                                                    <option value="<?=$mar->codigo_marca?>" <?=$selected?> ><?=$mar->marca?></option>
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
                                                    foreach($rs_cat as $cat){
                                                        $selected = ($cat->codigo_categoria == $rs_prod->producto_codigo_categoria) ? 'selected' : '';
                                                ?>
                                                    <option value="<?=$cat->codigo_categoria?>"  <?=$selected?> ><?=$cat->categoria?></option>
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