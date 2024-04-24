<!DOCTYPE html>
<html lang="es">
<?php
$ruta = "../..";
$titulo = "Aplicación de Ventas - Consultar Producto";
include("../includes/cabecera.php");
?>

<body style="background: #2980B9;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFFFFF, #6DD5FA, #2980B9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
    <?php
    include("../includes/menu.php");
    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-search"></i> Consultar Libro</h1>
            <hr />
        </header>

        <nav>
            <a href="listar_libro.php" class="btn btn-outline-secondary btn-sm">
                <li class="fas fa-arrow-circle-left"></li> Regresar
            </a>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="card col-md-6">
                        <div class="card-body">
                            <form id="frm_consultar_prod" name="frm_consultar_prod" method="post">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="txt_codprod" class="frm-label">Código</label>
                                        <input type="text" class="form-control" id="txt_codprod" name="txt_codprod" placeholder="Código a buscar" maxlength="5" autofocus />
                                    </div>
                                    <div class="col-md-8"></div>

                                    <div class="col-md-8">
                                        <div class="row align-items-start">
                                            <div class="col">
                                                <h5 class="card-title">Producto</h5>
                                                <p class="prod card-text">&nbsp;</p>
                                            </div>
                                            <div class="col">
                                                <h5 class="card-title">Stock disponible</h5>
                                                <p class="stk card-text">&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8"></div>

                                    <div>
                                        <div class="row align-items-start">
                                            <div class="col">
                                                <h5 class="card-title">Costo S/.</h5>
                                                <p class="cst card-text">&nbsp;</p>
                                            </div>
                                            <div class="col">
                                                <h5 class="card-title">% Ganancia</h5>
                                                <p class="gnc card-text">&nbsp;</p>
                                            </div>
                                            <div class="col">
                                                <h5 class="card-title">Precio S/.</h5>
                                                <p class="prc card-text">&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8"></div>

                                    <div class="col-md-8">
                                        <div class="row align-items-start">
                                            <div class="col">
                                                <h5 class="card-title">Marca</h5>
                                                <p class="mar card-text">&nbsp;</p>
                                            </div>
                                            <div class="col">
                                                <h5 class="card-title">Categoria</h5>
                                                <p class="cat card-text">&nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="text-center mt-3">
                                <a type="submit" href="consultar_producto.php" class="btn btn-outline-primary">
                                    <i class="fas fa-file"></i> Nuevo consulta
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>

        <!-- Modal Consulta error -->
        <div class="modal fade" id="md_consulta_error" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Advertencia</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include("../includes/pie.php");
        ?>
    </div>
</body>

</html>