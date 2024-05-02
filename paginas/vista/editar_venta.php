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

    if (isset($_GET["id_venta"])) {
        $id_venta = $_GET["id_venta"];
        $crudventa = new CRUDVenta();
        $rs_venta = $crudventa->BuscarVentaporID($id_venta);

        if (!empty($rs_venta)) {

        } else {
            header("location: listar_producto.php");
        }
    } else {
        header("location: listar_producto.php");
    }
    ?>
    <div class="container mt-3">
        <header>
            <h1 class="text-success"><i class="fas fa-pen-square"></i> Editar Venta</h1>
            <hr />
        </header>

        <nav>
            <a href="listar_venta.php" class="btn btn-outline-primary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form id="frm_editar_ven.php" name="frm_editar_ven" method="post" action="../controlador/ctr_grabar_ven.php" autocomplete="off">
                                    <input type="hidden" id="txt_tipo" name="txt_tipo" value="e" />

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="txt_id_venta" class="form-label">Id</label>
                                            <input type="text" class="form-control" id="txt_id_venta" name="txt_id_venta" placeholder="Id" maxlength="5" readonly value="<?= $rs_venta->id_venta ?>">
                                        </div>

                                        <div class="col-md-8">
                                            <label for="txt_id_libro" class="form-label">Libro</label>
                                            <input type="text" class="form-control" id="txt_id_libro" name="txt_id_libro" placeholder="Titulo" maxlength="40" value="<?= $rs_venta->id_libro ?>" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="txt_fecha" class="form-label">Fecha</label>
                                            <input type="date" class="form-control" id="txt_fecha" name="txt_fecha" placeholder="Autor" maxlength="5" min="1" max="9999" value="<?= $rs_venta->fecha_venta ?>" />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="txt_cant_vend" class="form-label">Cantidad Vendida</label>
                                            <input type="number" class="form-control" id="txt_cant_vend" name="txt_cant_vend" placeholder="Precio" min="1" max="100" step="0.01" value="<?= $rs_venta->cantidad_vendida ?>" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="txt_total" class="form-label">Total</label>
                                            <input type="number" class="form-control" id="txt_total" name="txt_total" placeholder="Precio" min="1" max="100" step="0.01" value="<?= $rs_venta->total ?>" />
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary" id="btn_registrar_ven" name="btn_registrar_ven">
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