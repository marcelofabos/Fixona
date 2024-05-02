<!DOCTYPE html>
<html lang="es">
    <?php
        $ruta = "../..";
        $titulo = "Aplicacion de Ventas - Registrar Producto";
        include("../includes/cabecera.php");
    ?>
    <body style="background: #2980B9;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
        <?php
            include("../includes/menu.php");
            include "../includes/cargar_clases.php";

            $crudeditoriales = new CRUDEditoriales();
            $crudcategoria = new CRUDCategoria();

            $rs_edito = $crudeditoriales->ListarEditorial();
            $rs_cat = $crudcategoria->ListarCategoria();
        ?>
        <div class="container mt-3">
            <header>
                <h1 class="text-primary">
                    <i class="fas fa-plus-circle"></i> Registrar Venta</h1>
                <hr />
            </header>

            <nav>
                <a href="listar_venta.php" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-circle-left"></i> Regresar
                </a>
            </nav>

            <section>
                <article>
                    <div class="row justify-content-center">
                        <div class="card col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <!--Inicio del Formulario-->
                                    <form id="frm_registrar_ven" name="frm_registrar_ven" method="post" action="../controlador/ctr_grabar_ven.php" autocomplete="off">
                                        <input type="hidden" id="txt_tipo" name="txt_tipo" value="r"/>

                                        <div class="row g-3">

                                            <div class="col-md-4">
                                                <label for="txt_id_venta" class="form-label">Id</label>
                                                <input type="text" class="form-control" id="txt_id_venta" name="txt_id_venta" placeholder="Id" maxlength="5" autofocus />
                                            </div>
                                            <div class="col-md-8">
                                                <label for="txt_id_libro" class="form-label">Libro</label>
                                                <input type="text" class="form-control" id="txt_id_libro" name="txt_id_libro" placeholder="Libro" maxlength="5" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_fecha" class="form-label">Fecha de Venta</label>
                                                <input type="date" class="form-control" id="txt_fecha" name="txt_fecha" placeholder="Fecha" maxlength="10" min="1" />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="txt_cant_vend" class="form-label">Cant. Vendida</label>
                                                <input type="number" class="form-control" id="txt_cant_vend" name="txt_cant_vend" placeholder="Cantidad"  />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="txt_total" class="form-label">Total</label>
                                                <input type="number" class="form-control" id="txt_total" name="txt_total" placeholder="Total"  />
                                            </div>
                                        </div><br>


                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary" id="btn_registrar_ven" name="btn_registrar_ven" >
                                                <i class="fas fa-save"></i> Grabar Informacion
                                        
                                            </button>
                                        </div>


                                    </form>
                                    <!--Fin-->
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